@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Tons</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    @if(Auth::user()->hasRole('Profesional'))
                                        <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <a href="{{ route('asistente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Institucion'))
                                        <a href="{{ route('institucion.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Servicio'))
                                        <a href="{{ route('servicio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>  --}}
                                    @endif
                                    {{--  <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>  --}}
                                </li>
                                <li class="breadcrumb-item"><a href="#">Tons</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="text-white f-20 d-inline">Tons</h4>
                                        <button type="button" class="btn btn-light btn-xs float-md-right d-inline" data-toggle="modal" data-target="#nueva_tons">
                                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Busca y registro TONS
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @if (isset($mensaje))
                                    <span class="alert alert-warning"> {{ $mensaje }}</span>
                                @endif
                            </div>
                            <table id="tabla_tons_profesional"
                                class="display table table-striped dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Lugar de atención</th>
                                        <th class="align-middle">Rut</th>
                                        <th class="align-middle">Tons</th>
                                        <th class="align-middle">Deshabilitar</th>
                                        <th class="align-middle">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- {{ dd($lugares) }} --}}
                                    @if (isset($relaciones))
                                        @foreach ($relaciones as $r)

                                            <tr>
                                                <td class="align-middle">{{ $r->nombre_lugar_atencion }}</td>
                                                <td class="align-middle">{{ $r->rut_tons }}</td>
                                                <td class="align-middle">{{ $r->nombre_tons }} {{ $r->apellido_tons }}</td>

                                                <td class="align-middle">
                                                    {{-- horario --}}
                                                    <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_horarios" data-toggle="modal" onclick="">
                                                        <i class="fas fa-clock"></i>
                                                    </button>

                                                </td>



                                                <td>
                                                    {{-- eliminar de lugar de atencion --}}

                                                    <div class="align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon accion_editar_valores" data-toggle="modal" onclick="eliminar_relacion_tons({{ $r->id }})" title="Eliminar">
                                                            <i class="feather icon-x"></i>
                                                        </button>
                                                    </div>

                                                </td>
                                            </tr>

                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal nuevo lugar de atención-->
    <div id="nueva_tons" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nueva_tons"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nueva_tons_titulo">Agregar nueva TONS&nbsp;</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id_tons" id="id_tons" value="">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group fill">
                                <label for="rut_tons" class="floating-label-activo-sm">Rut de tons</label>
                                <input type="text" name="rut_tons" id="rut_tons" class="form-control form-control-sm" oninput="formatoRut(this)">
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm w-100 my-3" onclick="buscar_tons()"><i class="fas fa-search"></i> Buscar</button>
                    </div>

                    <div class="form-row d-none" id="contenedor_tons">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_nueva_tons" id="nombre_nueva_tons" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                <input class="form-control form-control-sm" name="apellido_uno_nueva_tons" id="apellido_uno_nueva_tons" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                <input class="form-control form-control-sm" name="apellido_dos_nueva_tons" id="apellido_dos_nueva_tons" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Sexo</label>
                                <select name="sexo_nueva_tons" id="sexo_nueva_tons" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha de Nacimiento</label>
                                <input class="form-control form-control-sm" name="fecha_nac_nueva_tons" id="fecha_nac_nueva_tons" type="date">
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                <input class="form-control form-control-sm" name="direccion_nueva_tons" id="direccion_nueva_tons" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nº</label>
                                <input class="form-control form-control-sm" name="numero_nueva_tons" id="numero_nueva_tons" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required>
                                    <option value="">Seleccione</option>
                                    @if(isset($region))
                                    @foreach ($region as $reg)
                                        @if (isset($region))
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group ">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select id="tipo_nueva_tons" name="tipo_nueva_tons" class="js-example-basic-single form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Centro Médico</option>
                                    <option value="2">Consulta Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email_nueva_tons" id="email_nueva_tons" type="email">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="telefono_nueva_tons" id="telefono_nueva_tons" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <button type="button" class="btn btn-outline-success btn-sm w-100 my-3" onclick="registrar_tons()">Registrar</button>
                        </div>

                    </div>
                    <div class="form-row d-none" id="contenedor_datos_tons">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre_tons" class="floating-label-activo-sm">Nombre</label>
                                <input type="text" id="nombre_tons" name="nombre_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos_tons" class="floating-label-activo-sm">Apellidos</label>
                                <input type="text" id="apellidos_tons" name="apellidos_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="floating-label-activo-sm">Correo Electrónico</label>
                                <input type="email" id="email_tons" name="email_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="floating-label-activo-sm">Región</label>
                                <select name="region_tons" id="region_tons" class="form-control form-control-sm" disabled>
                                    @if(isset($region))
                                    @foreach ($region as $reg)
                                        @if (isset($region))
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="floating-label-activo-sm">Ciudad</label>
                                <input type="email" id="ciudad_tons" name="ciudad_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion_tons" class="floating-label-activo-sm">Dirección</label>
                                <input type="text" id="direccion_tons" name="direccion_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telefono_tons" class="floating-label-activo-sm">Teléfono</label>
                                <input type="text" id="telefono_tons" name="telefono_tons" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sexo_tons" class="floating-label-activo-sm">Sexo</label>
                                <select  id="sexo_tons" name="sexo_tons" class="form-control form-control-sm" disabled>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="lugar_atencion_tons" class="floating-label-activo-sm">Asigne lugar de atención</label>
                                <select  id="lugar_atencion_tons" name="lugar_atencion_tons" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    @if(isset($lugares_atencion))
                                    @foreach ($lugares_atencion as $lugar)
                                        @if (isset($lugar))
                                            <option value="{{ $lugar->id_lugar_atencion }}">{{ $lugar->nombre }} </option>
                                        @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-outline-success btn-sm my-3 w-100" onclick="solicitar_tons()">Asociar a mi equipo</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    function buscar_tons(){
        let rut_tons = $('#rut_tons').val();
        let id_profesional = $('#id_profesional').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_ficha_atencion = $('#id_fc').val();
        if(rut_tons == ''){
            swal({
                title:'info',
                icon:'info',
                text:'Debe ingresar rut'
            });
            return false;
        }
        let data = {
            rut_tons: rut_tons,
            id_profesional: id_profesional,
            id_lugar_atencion: id_lugar_atencion,
            id_ficha_atencion: id_ficha_atencion,
            _token: CSRF_TOKEN
        }

        let url = "{{ ROUTE('profesional.buscar_tons') }}";

        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    $('#contenedor_datos_tons').removeClass('d-none');
                    $('#contenedor_tons').addClass('d-none');
                    let tons = resp.tons;
                    $('#id_tons').val(tons.id);
                    $('#nombre_tons').val(tons.nombre);
                    $('#apellidos_tons').val(tons.apellido_uno+' '+tons.apellido_dos);
                    $('#email_tons').val(tons.email);
                    $('#region_tons').val(tons.ciudad.id_region);
                    $('#ciudad_tons').val(tons.ciudad.nombre);
                    $('#direccion_tons').val(tons.direccion.direccion+' '+tons.direccion.numero_dir);
                    $('#telefono_tons').val(tons.telefono_uno);
                    $('#sexo_tons').val(tons.sexo);
                    $('#lugar_atencion_tons').empty();
                    let lugares_atencion = resp.lugares_atencion;
                    $('#lugar_atencion_tons').append('<option value="0">Seleccione</option>');
                    lugares_atencion.forEach(lugar => {
                        $('#lugar_atencion_tons').append('<option value="'+lugar.id_lugar_atencion+'">'+lugar.nombre+'</option>');
                    });
                }else{
                    $('#contenedor_datos_tons').addClass('d-none');
                    $('#contenedor_tons').removeClass('d-none');
                }
            },
            error: function(error){
                console.log(error);
            }
        });


    }

    function solicitar_tons(){
        let id_tons = $('#id_tons').val();
        let lugar_atencion_profesional = $('#lugar_atencion_tons').val();

        if(lugar_atencion_profesional == 0){
            swal({
                title:'info',
                icon:'info',
                text:'Debe seleccionar lugar de atención'
            });
            return false;
        }
        console.log(id_tons);
        let url = "{{ ROUTE('profesional.solicitar_tons') }}";
        let data = {
            id_tons: id_tons,
            lugar_atencion_profesional: lugar_atencion_profesional,
            _token: CSRF_TOKEN
        };

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        icon: 'success',
                        title: 'Éxito',
                        text: resp.msj
                    });

                    // Cerrar modal
                    $('#nueva_tons').modal('hide');

                    let tonss = resp.tonss;
                    let table = $('#tabla_tons_profesional').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    tonss.forEach(tons => {
                        table.row.add([
                            tons.lugar_atencion,
                            tons.nombre_tons + ' ' + tons.apellido_tons,

                            `<button type="button" class="btn btn-info btn-sm btn-icon accion_editar_horarios">
                                <i class="fas fa-clock"></i>
                            </button>`,
                            `<button type="button" class="btn btn-danger btn-sm btn-icon accion_editar_valores" data-toggle="modal" onclick="eliminar_relacion_tons(${tons.id})" title="Eliminar">
                                <i class="feather icon-x"></i>
                            </button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                } else {
                    swal({
                        icon: 'info',
                        title: 'Info',
                        text: resp.msj
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }


    function registrar_tons() {
        let nombre = $('#nombre_nueva_tons').val().trim();
        let apellido_uno = $('#apellido_uno_nueva_tons').val().trim();
        let apellido_dos = $('#apellido_dos_nueva_tons').val().trim();
        let sexo = $('#sexo_nueva_tons').val();
        let fecha_nac = $('#fecha_nac_nueva_tons').val();
        let direccion = $('#direccion_nueva_tons').val().trim();
        let numero = $('#numero_nueva_tons').val().trim();
        let region = $('#region_agregar').val();
        let ciudad = $('#ciudad_agregar').val();
        let tipo = $('#tipo_nueva_tons').val();
        let email = $('#email_nueva_tons').val().trim();
        let telefono = $('#telefono_nueva_tons').val().trim();

        let valido = true;
        let mensaje = '';

        // Validación de campos requeridos
        if (nombre === '') {
            valido = false;
            mensaje += '<li>El nombre es obligatorio</li>';
        }
        if (apellido_uno === '') {
            valido = false;
            mensaje += '<li>El primer apellido es obligatorio</li>';
        }
        if(sexo == 0){
            valido = false;
            mensaje += '<li>Debe seleccionar sexo de tons</li>';
        }
        if(fecha_nac === ''){
            valido = false;
            mensaje += '<li>La fecha de nacimiento es obligatoria </li>';
        }
        if (direccion === '') {
            valido = false;
            mensaje += '<li>La dirección es obligatoria</li>';
        }
        if (numero === '') {
            valido = false;
            mensaje += '<li>El número es obligatorio</li>';
        }
        if (region === null || region === '') {
            valido = false;
            mensaje += '<li>Debes seleccionar una región</li>';
        }
        if (ciudad === null || ciudad === '') {
            valido = false;
            mensaje += '<li>Debes seleccionar una ciudad</li>';
        }
        if (tipo === null || tipo === '') {
            valido = false;
            mensaje += '<li>Debes seleccionar un tipo</li>';
        }

        // Validación de correo electrónico
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email !== '' && !emailRegex.test(email)) {
            valido = false;
            mensaje += '<li>El correo electrónico no es válido</li>';
        }

        // Validación de teléfono (solo números y longitud mínima)
        let telefonoRegex = /^[0-9]{9,15}$/; // De 9 a 15 dígitos
        if (telefono !== '' && !telefonoRegex.test(telefono)) {
            valido = false;
            mensaje += '<li>El teléfono debe contener solo números y tener entre 9 y 15 dígitos</li>';
        }

        // Si hay errores, mostramos el mensaje y detenemos la ejecución
        if (!valido) {
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
            rut: $('#rut_tons').val(),
            nombre: nombre,
            apellido_uno: apellido_uno,
            apellido_dos: apellido_dos,
            sexo: sexo,
            fecha_nac: fecha_nac,
            direccion: direccion,
            numero: numero,
            region: region,
            ciudad: ciudad,
            tipo: tipo,
            email: email,
            telefono: telefono,
            _token: CSRF_TOKEN
        };

        console.log(data);
        let url = "{{ ROUTE('profesional.registrar_nueva_tons') }}";
        // Aquí puedes hacer la petición AJAX para registrar la información
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        icon:'success',
                        text: resp.msj
                    });
                    buscar_tons();
                }else{
                    swal({
                        icon:'error',
                        text: resp.msj,
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function eliminar_relacion_tons(id){
        swal({
            title: "¿Esta seguro que desea ELIMINAR la relación tons profesional?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_relacion_tons(id);
            }
        });
    }

    function confirmar_eliminar_relacion_tons(id){
        console.log(id);
        let url = "{{ ROUTE('profesional.eliminar_tons') }}";
        let data = {
            id: id,
            _token: CSRF_TOKEN
        }
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 1){
                    swal({
                        icon:'success',
                        text: resp.msj
                    });
                    let tonss = resp.tonss;
                    let table = $('#tabla_tons_profesional').DataTable(); // Accede a la instancia de DataTable

                    // Limpia los datos de la tabla correctamente
                    table.clear();

                    // Agrega las nuevas filas
                    tonss.forEach(tons => {
                        table.row.add([
                            tons.lugar_atencion,
                            tons.nombre_tons + ' ' + tons.apellido_tons,
                            `<button type="button" class="btn btn-info btn-sm btn-icon accion_editar_horarios">
                                <i class="fas fa-clock"></i>
                            </button>`,
                            `<button type="button" class="btn btn-danger btn-sm btn-icon accion_editar_valores" data-toggle="modal" onclick="eliminar_relacion_tons(${tons.id})" title="Eliminar">
                                <i class="feather icon-x"></i>
                            </button>`
                        ]);
                    });

                    // Dibuja la tabla nuevamente
                    table.draw();
                }else{
                    swal({
                        icon:'error',
                        text: resp.msj
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

</script>
@endsection
