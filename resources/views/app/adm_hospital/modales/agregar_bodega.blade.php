<div id="agregar_bodega" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_bodega" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar Bodega</h5>
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
                                <input type="text" class="form-control form-control-sm" name="nombre_bodega_agregar" id="nombre_bodega_agregar" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo">Ubicacion</label>
                                <input type="text" name="direccion_bodega_agregar" id="direccion_bodega_agregar" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="descripcion_bodega">Descripcion</label>
                                <input type="text" class="form-control form-control-sm" id="descripcion_bodega_agregar" name="descripcion_bodega_agregar" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email_bodega_agregar" name="email_bodega_agregar" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="telefono">Telefono</label>
                                <input type="telefono" class="form-control form-control-sm" id="telefono_bodega_agregar" name="telefono_bodega_agregar" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="tpo_prod_bodega_agregar">Seleccionar Tipo de Productos</label>
                            <select class="form-control form-control-sm" name="tpo_prod_bodega_agregar" id="tpo_prod_bodega_agregar" multiple="multiple">
                                <optgroup label="Farmacia">
                                    @if(isset($tipos_productos))
                                    @foreach($tipos_productos as $c)
                                        <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                    @endforeach
                                    @endif
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Lista de materiales e insumos con autorización</label>
                                <select class="form-control form-control-sm" name="cont_ca_bodega_agregar" id="cont_ca_bodega_agregar" multiple="multiple">
                                    <optgroup label="Farmacia">
                                        @if(isset($tipos_productos))
                                        @foreach($tipos_productos as $c)
                                            <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                        @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="guardar_bodega()">Guardar Registro</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL editar_bodega -->
<div id="editar_bodega" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_bodega" aria-hidden="true">
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
                                <input type="text" class="form-control form-control-sm" name="nombre_bodega_editar" id="nombre_bodega_editar" >
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo">Ubicacion</label>
                                <input type="text" name="direccion_bodega_editar" id="direccion_bodega_editar" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="descripcion_bodega">Descripcion</label>
                                <input type="text" class="form-control form-control-sm" id="descripcion_bodega_editar" name="descripcion_bodega_editar" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email_bodega_editar" name="email_bodega_editar" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo" for="telefono">Telefono</label>
                                <input type="telefono" class="form-control form-control-sm" id="telefono_bodega_editar" name="telefono_bodega_editar" required>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label class="floating-label-activo-sm" for="tpo_prod">Seleccionar Tipo de Productos</label>
                            <select class="form-control form-control-sm" name="tpo_prod_bodega_editar" id="tpo_prod_bodega_editar" multiple="multiple">
                                <optgroup label="Farmacia">
                                    @if(isset($tipos_productos))
                                    @foreach($tipos_productos as $c)
                                        <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                    @endforeach
                                    @endif
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Lista de materiales e insumos con autorización</label>
                                <select class="form-control form-control-sm" name="cont_ca_bodega_editar" id="cont_ca_bodega_editar" multiple="multiple">
                                    <optgroup label="Farmacia">
                                        @if(isset($tipos_productos))
                                        @foreach($tipos_productos as $c)
                                            <option value="{{ $c->nombre }}">{{ $c->nombre }}</option>
                                        @endforeach
                                        @endif
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

    $(document).ready(function() {
        $('#tpo_prod_bodega_agregar').select2();
        $('#cont_ca_bodega_agregar').select2();

        $('#tpo_prod_bodega_editar').select2();
        $('#cont_ca_bodega_editar').select2();
    });

    function limpiar_formulario() {
        $('#nombre_bodega').val('');
        $('#desc_bodega').val('');
        $('#prof_resp').val('');
        $('#select_responsable').val('');
        $('#tpo_prod').val([]);
        $('#cont_ca').val([]);
        $('#Icon').val('');
    }

    function guardar_bodega(){
        var nombre = $('#nombre_bodega_agregar').val();
        var ubicacion = $('#direccion_bodega_agregar').val();
        var descripcion = $('#descripcion_bodega_agregar').val();
        var email = $('#email_bodega_agregar').val();
        var telefono = $('#telefono_bodega_agregar').val();
        var tpos_productos = $('#tpo_prod_bodega_agregar').val();
        var cont_ca = $('#cont_ca_bodega_agregar').val();
        var id_institucion = $('#id_institucion').val();

        if(nombre == '' || ubicacion == '' || descripcion == '' || email == '' || telefono == '' || tpos_productos == '' || cont_ca == ''){
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });

        } else {
            var data = {
                nombre: nombre,
                ubicacion: ubicacion,
                descripcion: descripcion,
                email: email,
                telefono: telefono,
                tpos_productos: tpos_productos,
                cont_ca: cont_ca,
                id_institucion: id_institucion,
                _token: '{{ csrf_token() }}',
            };


            $.ajax({
                url: '/guardar_bodega',
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
                        $('#agregar_bodega').modal('hide');
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
                                    row += `</ul></td>
                                            <td class="align-middle text-center">
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="editar_bodega(${bodega.id});"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_bodega(${bodega.id})"><i class="fas fa-trash"></i></button>
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
                    $('#select_responsable').empty();

                    // Llena el select con los responsables devueltos
                    responsablesArray.forEach(function(responsable) {
                        $('#select_responsable').append('<option value="' + responsable.id + '">' + responsable.nombre + ' '+responsable.apellido_uno+'</option>');
                    });
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function editar_bodega(idbodega){
        $('#editar_bodega').modal('show');

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
                let tipos_productos_autorizados = bodega.tipo_productos_autorizacion;

                var tipos_productos_array = tipos_productos;
                var tipos_productos_autorizados_array = tipos_productos_autorizados;
                console.log(tipos_productos_array);
                $('#select_responsable').val(bodega.id_responsable);
                // Llenar los campos del formulario
                $('#nombre_bodega_editar').val(bodega.nombre);
                $('#direccion_bodega_editar').val(bodega.direccion);
                $('#descripcion_bodega_editar').val(bodega.descripcion);
                $('#email_bodega_editar').val(bodega.email);
                $('#telefono_bodega_editar').val(bodega.telefono);
                $('#tpo_prod_bodega_editar').val(tipos_productos_array).trigger('change');
                $('#cont_ca_bodega_editar').val(tipos_productos_autorizados_array).trigger('change');
                $('#prof_resp_editar').val(bodega.rut_responsable);
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
                    $('#prof_resp').val(paciente.rut);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function editar_registro_bodega(){
        var nombre_bodega = $('#nombre_bodega_editar').val();
        var direccion = $('#direccion_bodega_editar').val();
        var email = $('#email_bodega_editar').val();
        var telefono = $('#telefono_bodega_editar').val();
        var descripcion_bodega = $('#descripcion_bodega_editar').val();
        var tpo_prod = $('#tpo_prod_bodega_editar').val();
        var cont_ca = $('#cont_ca_bodega_editar').val();
        var id_bodega = $('#idbodega').val();

        var data = {
            nombre_bodega: nombre_bodega,
            direccion: direccion,
            email: email,
            telefono: telefono,
            descripcion_bodega: descripcion_bodega,
            tpo_prod: tpo_prod,
            cont_ca: cont_ca,
            id_bodega: id_bodega,
        }

        console.log(data);

        if (nombre_bodega == '' || direccion == '' || email == '' || telefono == '' || descripcion_bodega == '' || tpo_prod == '' || cont_ca == '') {
            return swal({
                title: 'Error',
                text: 'Debe completar todos los campos',
                icon: 'error',
                button: 'Aceptar'
            });
        } else {
            var data = {
                nombre_bodega: nombre_bodega,
                direccion: direccion,
                email: email,
                telefono: telefono,
                descripcion_bodega: descripcion_bodega,
                tpo_prod: tpo_prod,
                cont_ca: cont_ca,
                id_bodega: id_bodega,
                _token: '{{ csrf_token() }}',
            };

            $.ajax({
                url: '{{ route("bodega.editar_registro_bodega") }}',
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
                        $('#editar_bodega').modal('hide');
                        let bodegas = data.bodegas;
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
                            row += `</ul></td>
                                    <td class="align-middle text-center"><ul>`;
                            bodega.responsables.forEach(responsable => {
                                row += `<li>${responsable.nombre_responsable} ${responsable.apellido_uno}</li>`;
                            });
                            row += `</ul></td>
                                    <td class="align-middle text-center">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="editar_bodega(${bodega.id});"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_bodega(${bodega.id})"><i class="fas fa-trash"></i></button>
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
    function añadir_bodega_nueva(){
            console.log('añadiendo bodega');
            $('#agregar_bodega').modal('show');
        }

        function añadir_bodega() {
        limpiar_formulario();
        $('#agregar_bodega_editar').modal('show');
    }
</script>
