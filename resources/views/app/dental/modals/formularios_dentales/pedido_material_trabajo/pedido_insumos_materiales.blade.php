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
                 <form id="form_pedido_insumos_materiales">
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
                                 <option value="instrumental">Instrumental</option>
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
                                 <option value="bodega">Bodega del Centro</option>
                                 <option value="proveedor">Proveedor</option>
                                 <option value="otro">Otro</option>
                             </select>
                         </div>

                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Cantidad</label>
                             <input type="number" class="form-control form-control-sm" name="cantidad_insumo_material"
                                 id="cantidad_insumo_material">
                         </div>
                         <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Uso en:</label>
                             <select class="form-control form-control-sm" name="uso_en_insumo_material" id="uso_en_insumo_material">
                                <option value="0">Seleccione</option>
                                <option value="clinica">Uso en clínica general</option>
                                <option value="paciente">Uso en este paciente</option>
                             </select>
                         </div>

                         {{-- <div class="form-group col-sm-12 col-md-12">
                             <label class="floating-label-activo-sm">Nombre Proveedor</label>
                             <input type="text" class="form-control form-control-sm"
                                 name="nombre_proveedor_cantidad_insumo_material"
                                 id="nombre_proveedor_cantidad_insumo_material">
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
                         </div> --}}


                         <div class="modal-footer pt-2 pb-0">
                             <button type="button" onclick="reset_form('form_pedido_insumos_materiales')"
                                 class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                             <button type="button" onclick="guardar_solicitud_insumos()" class="btn btn-info">Guardar</button>
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
                <table class="table mt-3" id="table_pedido_insumos_materiales">
                        <thead>
                            <tr>
                                <th scope="col">Tipo de Artículo</th>
                                <th scope="col">Nombre Insumo o Material</th>
                                <th scope="col">Pedir a</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Uso en</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo_tabla_pedido_insumos_materiales">
                            {{-- Aquí se llenará la tabla con los datos --}}
                            @if(isset($insumos_bodega))
                            @foreach ($insumos_bodega as $i)
                                <tr>
                                    <td>{{ $i->tipo_solicitud }}</td>
                                    <td>{{ $i->descripcion }}</td>
                                    <td>{{ $i->pedido_a }}</td>
                                    <td>{{ $i->cantidad }}</td>
                                    <td>{{ $i->uso }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pedido_insumos({{ $i->id }},'{{ $i->tipo_solicitud }}')">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                </table>
                <div class="col-sm-12 col-md-12 text-center mb-2">
                    <button type="button" class="btn btn-sm btn-primary" onclick="generar_pdf_pedido_insumos()">Ver documento en
                        PDF</button>
                </div>
             </div>
         </div>
     </div>
 </div>

 <script>
    function guardar_solicitud_insumos(){
        let valido = 1;
        let mensaje = '';
        let tipo_insumo_material = $('#tipo_insumo_material').val();
        let nombre_insumo_material = $('#nombre_insumo_material').val();
        let pedir_a = $('#lugar_pedido_insumo_material').val();
        let cantidad = $('#cantidad_insumo_material').val();
        let uso_en = $('#uso_en_insumo_material').val();

        if(tipo_insumo_material == 0){
            valido = 0;
            mensaje += '<li>TIPO INSUMO</li>';
        }
        if(nombre_insumo_material == ''){
            valido = 0;
            mensaje += '<li>NOMBRE INSUMO</li>';
        }
        if(pedir_a == 0){
            valido = 0;
            mensaje += '<li>PEDIR A</li>';
        }
        if(cantidad == ''){
            valido = 0;
            mensaje += '<li>CANTIDAD</li>';
        }
        if(uso_en == 0){
            valido = 0;
            mensaje += '<li>USO EN</li>';
        }

        if(valido == 0){
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let data = {
            tipo_insumo_material: tipo_insumo_material,
            nombre_insumo_material: nombre_insumo_material,
            lugar_pedido_insumo_material: pedir_a,
            cantidad_insumo_material: cantidad,
            uso_en_insumo_material: uso_en,
            id_paciente: dame_id_paciente(),
            id_ficha_atencion: $('#id_fc').val(),
            _token: '{{ csrf_token() }}'
        }

        $.ajax({
            type: 'POST',
            url: "{{ route('dental.registrar_pedido_insumos_materiales') }}",
            data: data,
            success: function (response) {
                console.log(response);
                if (response.status == 1) {
                    let table = $('#table_pedido_insumos_materiales').DataTable();
                    table.clear().draw();
                    let pedidos = response.pedidos;
                    for (let i = 0; i < pedidos.length; i++) {
                        let pedido = pedidos[i];
                        table.row.add([
                            pedido.tipo_solicitud,
                            pedido.descripcion,
                            pedido.pedido_a,
                            pedido.cantidad,
                            pedido.uso,
                            `<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pedido_insumos(${pedido.id},'${pedido.tipo_solicitud}')">Eliminar</button>`
                        ]).draw(false);
                    }

                    $('#tipo_insumo_material').val(0);
                    $('#nombre_insumo_material').val('');
                    $('#lugar_pedido_insumo_material').val(0);
                    $('#cantidad_insumo_material').val('');
                    $('#uso_en_insumo_material').val(0);
                    // $('#modal_pedido_insumos').modal('hide');
                    swal({
                        title: "Pedido guardado",
                        text: "El pedido ha sido guardado correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
            }
        })
    }

    function eliminar_pedido_insumos(id, tipo){
        swal({
            title: "¿Está seguro de eliminar este pedido?",
            text: "Una vez eliminado, no podrá recuperarlo.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('dental.eliminar_pedido_insumos_materiales') }}",
                    data: {
                        id: id,
                        tipo: tipo,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status == 1) {
                            $('#cuerpo_tabla_pedido_insumos_materiales').empty();
                            let pedidos = response.pedidos;
                            let table = $('#table_pedido_insumos_materiales').DataTable();
                            table.clear().draw();
                            for (let i = 0; i < pedidos.length; i++) {
                                let pedido = pedidos[i];
                                table.row.add([
                                    pedido.tipo_solicitud,
                                    pedido.descripcion,
                                    pedido.pedido_a,
                                    pedido.cantidad,
                                    pedido.uso,
                                    `<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_pedido_insumos(${pedido.id},'${pedido.tipo_solicitud}')">Eliminar</button>`
                                ]).draw(false);
                            }
                        } else {
                            swal({
                                title: "Error",
                                text: response.mensaje,
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr);
                        console.error(status);
                        console.error(error);
                    }
                });
            }
        });
    }

    function generar_pdf_pedido_insumos(){
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = dame_id_paciente();
        let data = {
            id_ficha_atencion: id_ficha_atencion,
            id_paciente: id_paciente,
            _token: '{{ csrf_token() }}'
        }
        $.ajax({
            type: 'POST',
            url: "{{ route('dental.generar_pdf_pedido_insumos') }}",
            data: data,
            success: function (response) {
                console.log(response);
                if (response.status == 1) {
                    // window.open({
                    //     url: response.url,
                    //     target: '_blank'
                    // });
                    // Abrir el PDF en una ventana emergente
                    var width = 800;
                    var height = 600;
                    var left = (screen.width - width) / 2;
                    var top = (screen.height - height) / 2;
                    window.open(response.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                    swal({
                        title: "PDF generado",
                        text: "El PDF ha sido generado correctamente.",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                } else {
                    swal({
                        title: "Error",
                        text: response.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr);
                console.error(status);
                console.error(error);
            }
        });
    }
 </script>
