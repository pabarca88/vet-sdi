<div id="agregar_bodega_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_bodega_editar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar Responsable</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-2 mb-3">Ingrese datos responsable</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Seleccione bodega</label>
                                <select name="bodega_para_responsable" id="bodega_para_responsable" class="form-control form-control-sm">
                                    @foreach($bodegas as $b)
                                        <option value="{{ $b->id }}">{{ $b->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="floating-label-activo">Buscar Rut</label>
                                <input type="text" class="form-control form-control-sm" name="prof_resp" id="prof_resp" onkeypress="buscarResponsable(event,'agregar')">
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="floating-label-activo">Selecciona un Responsable</label>
                                <select class="form-control form-control-sm" id="select_responsable">
                                    @foreach($profesionales as $r)
                                        <option value="{{ $r->id }}">{{ $r->nombre }} {{ $r->apellido_uno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="numero_turno">N° / T</label>
                                <input type="number" class="form-control form-control-sm" id="numero_turno" >
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="guardar_responsable_bodega()">Guardar Registro</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL editar_bodega_editar -->
<div id="editar_bodega_editar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_bodega_editar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar Bodega</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos de la Bodega</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo">Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_bodega" id="nombre_bodega" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo">Ubicacion</label>
                                <input type="text" name="direccion_bodega" id="direccion_bodega" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="descripcion_bodega">Descripcion</label>
                                <input type="text" class="form-control form-control-sm" id="descripcion_bodega" name="descripcion_bodega" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email_bodega" name="email_bodega" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="telefono">Telefono</label>
                                <input type="telefono" class="form-control form-control-sm" id="telefono_bodega" name="telefono_bodega" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="tpo_prod">Seleccionar Tipo de Productos</label>
                            <select class="form-control form-control-sm" name="tpo_prod_bodega" id="tpo_prod_bodega" multiple="multiple">
                                <optgroup label="Farmacia">
                                    @foreach($tipos_productos as $c)
                                        <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Lista de materiales e insumos con autorización</label>
                                <select class="form-control form-control-sm" name="cont_ca_bodega" id="cont_ca_bodega" multiple="multiple">
                                    <optgroup label="Farmacia">
                                        @foreach($tipos_productos as $c)
                                            <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" onclick="editar_registro_bodega()">Editar Registro</button>
            </div>
        </div>
    </div>
</div>
 <script>
    function añadir_bodega() {
        limpiar_formulario();
        $('#agregar_bodega_editar').modal('show');
    }

    function limpiar_formulario() {
        $('#nombre_bodega').val('');
        $('#desc_bodega').val('');
        $('#prof_resp').val('');
        $('#select_responsable').val('');
        $('#tpo_prod').val([]);
        $('#cont_ca').val([]);
        $('#Icon').val('');
    }

    function guardar_responsable_bodega(){
        var bodega_para_responsable = $('#bodega_para_responsable').val();
        var id_responsable = $('#select_responsable').val();
        var prof_resp = $('#prof_resp').val();
        var numero_turno = $('#numero_turno').val();

        if (numero_turno == '' || id_responsable == '' || prof_resp == '') {
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });
        } else {
            var data = {
                bodega_para_responsable: bodega_para_responsable,
                id_responsable: id_responsable,
                prof_resp: prof_resp,
                numero_turno: numero_turno,
                _token: '{{ csrf_token() }}',
            };


            $.ajax({
                url: '/guardar_responsable_bodega',
                type: 'POST',
                data: data,
                success: function(data) {
                    console.log(data);
                    if (data.mensaje == 'OK') {
                        swal({
                            title: 'Registro guardado',
                            text: 'El registro se ha guardado correctamente',
                            icon: 'success',
                            button: 'Aceptar'

                        });
                        $('#agregar_bodega_editar').modal('hide');
                        let bodegas = data.bodegas;
                        console.log(bodegas);
                        $('#sucursales_cm tbody').empty();

                        bodegas.forEach(bodega => {
                                    let row = `
                                        <tr>
                                            <td class="align-middle text-center">${bodega.nombre}</td>
                                            <td class="align-middle text-center">${bodega.direccion}</td>
                                            <td class="align-middle text-center"><ul>`;
                                    bodega.tipos_productos.forEach(tp => {
                                        row += `<li>${tp}</li>`;
                                    });
                                    row += `</ul></td>
                                            <td class="align-middle text-center"><ul>`;
                                    bodega.tipo_productos_autorizacion.forEach(tp => {
                                        row += `<li>${tp}</li>`;
                                    });
                                    row += `</ul></td>`;
                                    row += `<td class="align-middle text-center"><ul>`;
                                    bodega.responsables.forEach(responsable => {
                                        row += `<li>${responsable.nombre_responsable} ${responsable.apellido_uno}</li>`;
                                    });
                                    row += `</ul></td>`;
                                    row += `
                                            <td class="align-middle text-center">
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="editar_bodega(${bodega.id});"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_responsable_bodega(${bodega.id})"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>`;
                                    $('#sucursales_cm tbody').append(row);
                                });
                    } else {
                        alert('Error al guardar el registro');
                    }
                },
                error: function(data) {
                    console.log(data);
                    alert('Error al guardar el registro');
                }
            });
        }

    }

    function buscarResponsable(event,opcion) {
        var rut = event.target.value + event.key; // El rut que se está ingresando
        // Crear una nueva solicitud AJAX con jquery
        $.ajax({
            url: '/buscar_rut_profesional_bodega',
            type: 'POST',
            data: {
                rut: rut,
                _token: '{{ csrf_token() }}',
            },
            success: function(responsables) {
                console.log(responsables);
                var responsablesArray = JSON.parse(responsables);

                if(opcion == 'agregar'){
                    // Vacía el select
                    $('#select_responsable').empty();

                    // Llena el select con los responsables devueltos
                    responsablesArray.forEach(function(responsable) {
                        $('#select_responsable').append('<option value="' + responsable.id + '">' + responsable.nombre + ' '+responsable.apellido_uno+'</option>');
                    });
                }else{
                    // Vacía el select
                    $('#select_responsable_editar').empty();

                    // Llena el select con los responsables devueltos
                    responsablesArray.forEach(function(responsable) {
                        $('#select_responsable_editar').append('<option value="' + responsable.id + '">' + responsable.nombre + ' '+responsable.apellido_uno+'</option>');
                    });
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function editar_bodega(idbodega){
        $('#editar_bodega_editar').modal('show');

        $.ajax({
            url: '{{ route("bodegas.edit", "id") }}'.replace('id', idbodega),
            type: 'get',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(data) {
                console.log(data);
                let bodega = data.bodega;
                $('#idbodega').val(bodega.id);
                let responsables = data.responsables;
                let tipos_productos = bodega.tipos_productos;
                let tipos_productos_autorizados = bodega.tipos_productos_autorizacion;

                var tipos_productos_array = tipos_productos;
                var tipos_productos_autorizados_array = tipos_productos_autorizados;
                console.log(tipos_productos_array);
                // Seleccionar las opciones en tpo_prod
                $('#tpo_prod_editar').val(tipos_productos_array).trigger('change');

                // Seleccionar las opciones en cont_ca
                $('#cont_ca_editar').val(tipos_productos_autorizados_array).trigger('change');
                $('#select_responsable_editar').val(bodega.id_responsable);
            },
            error: function(data) {
                console.log(data);
            }
        });

    }

    function dameRutResponsable(idResponsable,opcion) {

        $.ajax({
            url: '/devolver_rut_profesional',
            type: 'POST',
            data: {
                id: idResponsable,
                _token: '{{ csrf_token() }}',
            },
            success: function(paciente) {
                console.log(paciente);
                console.log(JSON.parse(paciente));
                paciente = JSON.parse(paciente);
                if(opcion == 'agregar'){
                    $('#prof_resp').val(paciente.rut);
                }else{
                    $('#prof_resp_editar').val(paciente.rut);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function editar_registro_bodega(){
        var idbodega = $('#idbodega').val();
        var nombre_bodega = $('#nombre_bodega_editar').val();
        var direcccion_bodega = $('#direccion_bodega_editar').val();
        var descripcion_bodega = $('#descripcion_bodega_editar').val();
        var email_bodega = $('#email_bodega_editar').val();
        var telefono_bodega = $('#telefono_bodega_editar').val();
        var id_responsable = $('#select_responsable_editar').val();
        var prof_resp = $('#prof_resp_editar').val();
        var tpo_prod = $('#tpo_prod_editar').val();
        var cont_ca = $('#cont_ca_editar').val();

        var data = {
            idbodega: idbodega,
            nombre_bodega: nombre_bodega,
            direcccion_bodega: direcccion_bodega,
            descripcion_bodega: descripcion_bodega,
            email_bodega: email_bodega,
            telefono_bodega: telefono_bodega,
            id_responsable: id_responsable,
            prof_resp: prof_resp,
            tpo_prod: tpo_prod,
            cont_ca: cont_ca,
            _token: '{{ csrf_token() }}',
        }

        console.log(data);

        if (nombre_bodega == '' || descripcion_bodega == '' || id_responsable == '' || prof_resp == '' || tpo_prod == '' || cont_ca == '' ) {
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });
        } else {
            var data = {
                idbodega: idbodega,
                nombre_bodega: nombre_bodega,
                direcccion_bodega: direcccion_bodega,
                descripcion_bodega: descripcion_bodega,
                email_bodega: email_bodega,
                telefono_bodega: telefono_bodega,
                id_responsable: id_responsable,
                prof_resp: prof_resp,
                tpo_prod: tpo_prod,
                cont_ca: cont_ca,
                _token: '{{ csrf_token() }}',
            };

            $.ajax({
                url: '{{ route("bodega.editar_registro_bodega") }}',
                type: 'POST',
                data: {
                    idbodega: idbodega,
                    nombre_bodega: nombre_bodega,
                    descripcion_bodega: descripcion_bodega,
                    id_responsable: id_responsable,
                    prof_resp: prof_resp,
                    tpo_prod: tpo_prod,
                    cont_ca: cont_ca,
                    Icon: Icon,
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    console.log(data);
                    if (data.mensaje == 'OK') {
                        swal({
                            title: 'Registro guardado',
                            text: 'El registro se ha guardado correctamente',
                            icon: 'success',
                            button: 'Aceptar'
                        });
                        $('#editar_bodega_editar').modal('hide');
                        let bodegas = data.bodegas;
                        $('#sucursales_cm tbody').empty();
                        bodegas.forEach(bodega => {
                            let row = `
                                <tr>
                                    <td class="align-middle text-center">${bodega.nombre_responsable} ${bodega.apellido_uno_responsable}</td>
                                    <td class="align-middle text-center">${bodega.numero_turno}</td>
                                    <td class="align-middle text-center"><ul>`;
                            bodega.tipos_productos.forEach(tp => {
                                row += `<li>${tp}</li>`;
                            });
                            row += `</ul></td>
                                    <td class="align-middle text-center"><ul>`;
                            bodega.tipo_productos_autorizacion.forEach(tp => {
                                row += `<li>${tp}</li>`;
                            });
                            row += `</ul></td>
                                    <td><ul>`;
                            bodega.responsables.forEach(responsable => {
                                row += `<li>${responsable.nombre} ${responsable.apellido_uno}</li>`;
                            });
                            row += `</ul></td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="editar_bodega(${bodega.id});"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_responsable_bodega(${bodega.id})"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>`;
                            $('#sucursales_cm tbody').append(row);
                        });
                    } else {
                        swal({
                            title: 'Error',
                            text: data.mensaje,
                            icon: 'error',
                            button: 'Aceptar'
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                    swal({
                        title: 'Error',
                        text: data.responseText,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            });
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#tpo_prod').select2();
        $('#cont_ca').select2();
        $('#tpo_prod_editar').select2();
        $('#cont_ca_editar').select2();
    });

    $('#select_responsable').change(function() {
        // Obtener el valor seleccionado
        var valorSeleccionado = $(this).val();

        // Ejecutar tu función con el valor seleccionado
        dameRutResponsable(valorSeleccionado,'agregar');
    });


    $('#select_responsable_editar').change(function() {
        // Obtener el valor seleccionado
        var valorSeleccionado = $(this).val();

        // Ejecutar tu función con el valor seleccionado
        dameRutResponsable(valorSeleccionado,'editar');

    });



</script>
