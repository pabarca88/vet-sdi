 <div id="modal_pedido_insumos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_pedido_insumos"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-white text-center">Pedido de Insumos / Materiales</h5>
                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                         aria-hidden="true">×</span></button>
             </div>
             <div class="modal-body mb-0">
                 <form id="form_pedido_insumos_materiales"
                     action="{{ route('dental.registrar_pedido_insumos_materiales') }}" method="post">
                     <div class="form-row">
                         <div class="form-group col-sm-12 col-md-12">
                             <script>
                                 var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                     "Octubre", "Noviembre", "Diciembre");
                                 var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                 var f = new Date();
                                 document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                     .getFullYear());
                             </script>
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Tipo de Artículo :</label>
                             <select id="tipo_insumo_material" name="tipo_insumo_material"
                                 class="form-control form-control-sm">
                                 <option value="0">Seleccione una opción </option>
                                 <option value="insumo">Insumo</option>
                                 <option value="material">Material</option>

                             </select>
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Nombre Insumo o Material</label>
                             <input type="text" class="form-control form-control-sm" name="nombre_insumo_material"
                                 id="nombre_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Pedir a :</label>
                             <select id="lugar_pedido_insumo_material" name="lugar_pedido_insumo_material"
                                 class="form-control form-control-sm">
                                 <option value="0">Seleccione una opción </option>
                                 @if(isset($bodegas))
                                    @foreach ($bodegas as $bodega)
                                        <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                                    @endforeach
                                @endif

                             </select>
                         </div>

                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Cantidad</label>
                             <input type="number" class="form-control form-control-sm" name="cantidad_insumo_material"
                                 id="cantidad_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Uso en:</label>
                             <input type="text" class="form-control form-control-sm" name="uso_cantidad_insumo_material"
                                 id="uso_cantidad_insumo_material">
                         </div>

                         <div class="form-group col-sm-12 col-md-12 d-flex">
                            <div>
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Seleccione Proveedor</label>
                                    <select name="nombre_proveedor_cantidad_insumo_material" id="nombre_proveedor_cantidad_insumo_material" class="form-control form-control-sm">
                                        @if(isset($proveedores))
                                        <option value="0">Seleccione una opción </option>
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                        @endforeach
                                        <option value="">Nuevo</option>
                                        @endif
                                    </select>
                                </div>

                            </div>
                             <div>
                                <button type="button" class="btn btn-success btn-sm">+</button>
                             </div>

                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Dirección</label>
                             <input type="text" class="form-control form-control-sm"
                                 name="direccion_proveedor_cantidad_insumo_material"
                                 id="direccion_proveedor_cantidad_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Email</label>
                             <input type="email" class="form-control form-control-sm"
                                 name="email_proveedor_cantidad_insumo_material"
                                 id="email_proveedor_cantidad_insumo_material">
                         </div>
                         <div class="col-sm-12 col-md-12 text-center mb-2">
                            <button type="button" class="btn btn-sm btn-success" onclick="agregar_insumo_pedido()">+</button>
                             <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_insumos_dental()">Ver documento en
                                 PDF</button>
                         </div>

                         <div class="modal-footer pt-2 pb-0">
                             <button type="button" onclick="reset_form('form_pedido_insumos_materiales')"
                                 class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                             <button type="submit" class="btn btn-info">Guardar</button>
                         </div>
                     </div>
                 </form>
                 <!---*******  Pedido insumos con autorización administrador genera petición de código autorización********-->
                 <!--<ul class="nav nav-pills mt-3 mb-4" id="pills-ext" role="tablist">
                     <li class="nav-item">

                         <a class="nav-link-modal" id="pills-tab-extcvb" data-toggle="pill" href="#extcvb" role="tab"
                             aria-controls="pills-tab-extcvb" aria-selected="false">Solicitar Visto Bueno</a>
                     </li>
                 </ul>
                -->
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Tipo de Artículo</th>
                            <th>Nombre Insumo o Material</th>
                            <th>Pedir a</th>
                            <th>Cantidad</th>
                            <th>Uso en</th>
                            <th>Proveedor</th>
                            <th>Dirección</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($insumos))
                            @foreach ($insumos as $insumo)
                                <tr>
                                    <td>{{ $insumo->tipo_insumo_material }}</td>
                                    <td>{{ $insumo->nombre_insumo_material }}</td>
                                    <td>{{ $insumo->lugar_pedido_insumo_material }}</td>
                                    <td>{{ $insumo->cantidad_insumo_material }}</td>
                                    <td>{{ $insumo->uso_cantidad_insumo_material }}</td>
                                    <td>{{ $insumo->nombre_proveedor_cantidad_insumo_material }}</td>
                                    <td>{{ $insumo->direccion_proveedor_cantidad_insumo_material }}</td>
                                    <td>{{ $insumo->email_proveedor_cantidad_insumo_material }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
             </div>
         </div>
     </div>
 </div>
 <script>
    function ped_materiales()
    {
        $('#modal_pedido_insumos').modal('show');
    }

    function agregar_insumo_pedido(){
        var tipo_insumo_material = $('#tipo_insumo_material').val();
        var nombre_insumo_material = $('#nombre_insumo_material').val();
        var lugar_pedido_insumo_material = $('#lugar_pedido_insumo_material').val();
        var cantidad_insumo_material = $('#cantidad_insumo_material').val();
        var uso_cantidad_insumo_material = $('#uso_cantidad_insumo_material').val();
        var nombre_proveedor_cantidad_insumo_material = $('#nombre_proveedor_cantidad_insumo_material').val();
        var direccion_proveedor_cantidad_insumo_material = $('#direccion_proveedor_cantidad_insumo_material').val();
        var email_proveedor_cantidad_insumo_material = $('#email_proveedor_cantidad_insumo_material').val();

        var valido = 1;
        var mensaje = '';

        if(tipo_insumo_material == 0){
            mensaje += '<li>Tipo de insumo o material </li>';
            valido = 0;
        }

        if(nombre_insumo_material == ''){
            mensaje += '<li>Nombre del insumo o material </li>';
            valido = 0;
        }

        if(lugar_pedido_insumo_material == 0){
            mensaje += '<li>Lugar de pedido </li>';
            valido = 0;
        }

        if(cantidad_insumo_material == ''){
            mensaje += '<li>Cantidad </li>';
            valido = 0;
        }

        if(uso_cantidad_insumo_material == ''){
            mensaje += '<li>Uso </li>';
            valido = 0;
        }

        if(nombre_proveedor_cantidad_insumo_material == 0){
            mensaje += '<li>Proveedor </li>';
            valido = 0;
        }

        if(direccion_proveedor_cantidad_insumo_material == ''){
            mensaje += '<li>Dirección del proveedor </li>';
            valido = 0;
        }

        if(email_proveedor_cantidad_insumo_material == ''){
            mensaje += '<li>Email del proveedor </li>';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title:'Campos requeridos',
                content:{
                    element:'ul',
                    attributes:{
                        innerHTML:mensaje
                    }
                },
                icon:'error',
                button:false
            });
            return false;
        }

        var data = {
            id_paciente: dame_id_paciente(),
            tipo_insumo_material: tipo_insumo_material,
            nombre_insumo_material: nombre_insumo_material,
            lugar_pedido_insumo_material: lugar_pedido_insumo_material,
            cantidad_insumo_material: cantidad_insumo_material,
            uso_cantidad_insumo_material: uso_cantidad_insumo_material,
            nombre_proveedor_cantidad_insumo_material: nombre_proveedor_cantidad_insumo_material,
            direccion_proveedor_cantidad_insumo_material: direccion_proveedor_cantidad_insumo_material,
            email_proveedor_cantidad_insumo_material: email_proveedor_cantidad_insumo_material,
            _token: CSRF_TOKEN
        };

        console.log(data);

        $.ajax({
            url: "{{ route('dental.agregar_insumo_pedido') }}",
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                if(data == 'error'){
                    swal({
                        title:'Error',
                        text:'Primero debe generar la liquidación.',
                        icon:'error',
                        button:"Aceptar"
                    });
                    return false;
                }
                if(data == 'ok'){
                    swal({
                        title: "Insumo agregado",
                        text: "El insumo se ha agregado correctamente",
                        icon: "success",
                        button: "Aceptar"
                    });
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al agregar el insumo",
                        icon: "error",
                        button: "Aceptar"
                    });
                }

            }
        });
    }

    function generar_pdf_insumos_dental(){
        var tipo_insumo_material = $('#tipo_insumo_material').val();
        var nombre_insumo_material = $('#nombre_insumo_material').val();
        var lugar_pedido_insumo_material = $('#lugar_pedido_insumo_material').val();
        var cantidad_insumo_material = $('#cantidad_insumo_material').val();
        var uso_cantidad_insumo_material = $('#uso_cantidad_insumo_material').val();
        var nombre_proveedor_cantidad_insumo_material = $('#nombre_proveedor_cantidad_insumo_material').val();
        var direccion_proveedor_cantidad_insumo_material = $('#direccion_proveedor_cantidad_insumo_material').val();
        var email_proveedor_cantidad_insumo_material = $('#email_proveedor_cantidad_insumo_material').val();

        var valido = 1;
        var mensaje = '';

        if(tipo_insumo_material == 0){
            mensaje += '<li>Tipo de insumo o material </li>';
            valido = 0;
        }

        if(nombre_insumo_material == ''){
            mensaje += '<li>Nombre del insumo o material </li>';
            valido = 0;
        }

        if(lugar_pedido_insumo_material == 0){
            mensaje += '<li>Lugar de pedido </li>';
            valido = 0;
        }

        if(cantidad_insumo_material == ''){
            mensaje += '<li>Cantidad </li>';
            valido = 0;
        }

        if(uso_cantidad_insumo_material == ''){
            mensaje += '<li>Uso </li>';
            valido = 0;
        }

        if(nombre_proveedor_cantidad_insumo_material == 0){
            mensaje += '<li>Proveedor </li>';
            valido = 0;
        }

        if(direccion_proveedor_cantidad_insumo_material == ''){
            mensaje += '<li>Dirección del proveedor </li>';
            valido = 0;
        }

        if(email_proveedor_cantidad_insumo_material == ''){
            mensaje += '<li>Email del proveedor </li>';
            valido = 0;
        }

        if(valido == 0){
            swal({
                title:'Campos requeridos',
                content:{
                    element:'ul',
                    attributes:{
                        innerHTML:mensaje
                    }
                },
                icon:'error',
                button:false
            });
            return false;
        }

        var data = {
            id_paciente: dame_id_paciente(),
            tipo_insumo_material: tipo_insumo_material,
            nombre_insumo_material: nombre_insumo_material,
            lugar_pedido_insumo_material: lugar_pedido_insumo_material,
            cantidad_insumo_material: cantidad_insumo_material,
            uso_cantidad_insumo_material: uso_cantidad_insumo_material,
            nombre_proveedor_cantidad_insumo_material: nombre_proveedor_cantidad_insumo_material,
            direccion_proveedor_cantidad_insumo_material: direccion_proveedor_cantidad_insumo_material,
            email_proveedor_cantidad_insumo_material: email_proveedor_cantidad_insumo_material,
            _token: CSRF_TOKEN
        };

        console.log(data);

        $.ajax({
            url: "{{ route('dental.generar_pdf_insumos_dental_sidebar') }}",
            type: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                    if(data == 'error'){
                        swal({
                            title:'Error',
                            text:'Primero debe generar la liquidación.',
                            icon:'error',
                            button:"Aceptar"
                        });
                        return false;
                    }
                    if(data.ruta){
                        swal({
                            title: "Reporte generado",
                            text: "El reporte se ha generado correctamente",
                            icon: "success",
                            button: "Aceptar"
                        }).then(() => {
                            // Abrir el PDF en una ventana emergente
                            var width = 800;
                            var height = 600;
                            var left = (screen.width - width) / 2;
                            var top = (screen.height - height) / 2;
                            window.open(data.ruta, 'Presupuesto dental', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                        });
                    }else{
                        swal({
                            title: "Error",
                            text: "Ha ocurrido un error al generar el reporte",
                            icon: "error",
                            button: "Aceptar"
                        });
                    }

            }
        });

    }
</script>
