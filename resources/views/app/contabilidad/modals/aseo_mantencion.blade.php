<div id="registrar_personalaseoymantencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registrar_personalaseoymantencion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Nuevo/a Personal Aseo y Mantenci&oacute;n</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="text" oninput="formatoRut(this)" class="form-control form-control-sm" name="rut_mantencion" id="rut_mantencion">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha Contrato</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_mantencion" id="fecha_mantencion">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_mantencion" id="nombre_mantencion" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                <input class="form-control form-control-sm" name="apellido1_mantencion" id="apellido1_mantencion" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                <input class="form-control form-control-sm" name="apellido2_mantencion" id="apellido2_mantencion" type="text" >
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select class="form-control form-control-sm"id="tipo_mantencion" name="tipo_mantencion">
                                    <option>Seleccione  opci&oacute;n</option>
                                    <option value="AL">Empresa Aseo</option>
                                    <option value="LA">Empresa Mantenci&oacute;n</option>
                                    <option value="VA">Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input class="form-control form-control-sm" name="email_mantencion" id="email_mantencion" type="email" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input class="form-control form-control-sm" name="telefono_mantencion" id="telefono_mantencion" type="number" >
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select class="form-control form-control-sm" id="region_mantencion" onchange="buscar_ciudad_mantencion()">
                                    <option value="0">Seleccione  opci&oacute;n</option>
                                    @foreach($regiones as $region)
                                        <option value="{{$region->id}}">{{$region->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm" id="comuna_mantencion">
                                    <option value="0">Seleccione  opci&oacute;n</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n / Calle</label>
                                <input class="form-control form-control-sm" name="direccion_mantencion" id="direccion_mantencion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&uacute;mero / Dpto.</label>
                                <input class="form-control form-control-sm" name="numero_mantencion" id="numero_mantencion" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Profesi&oacute;n u Oficio</label>
                                    <select class="form-control form-control-sm" name="profesion_mantencion" id="profesion_mantencion">
                                        <option value="0">Seleccione  opci&oacute;n</option>
                                        <option value="AL">Aseo</option>
                                        <option value="LA">Mantenci&oacute;n</option>
                                        <option value="VA">Otra</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Funci&oacute;n Asignada</label>
                                <select class="form-control form-control-sm" name="funcion_mantencion" id="funcion_mantencion">
                                    <option value="0">Seleccione  opci&oacute;n</option>
                                    <option value="AL">Aseo</option>
                                    <option value="LA">gasfiter&iacute;a</option>
                                    <option value="LA">Electricidad</option>
                                    <option value="VA">Otra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 d-none" id="otra_funcion_mantencion">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Otra Funci&oacute;n</label>
                                <input class="form-control form-control-sm" name="ot_func_mantencion" id="ot_func_mantencion" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Horas Trabajadas</label>
                                <input class="form-control form-control-sm" name="horas_trabajadas_mantencion" id="horas_trabajadas_mantencion" type="text" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Remuneracion</label>
                                <input class="form-control form-control-sm" name="remuneracion_mantencion" id="remuneracion_mantencion" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="switch switch-alert d-inline m-r-10">
                                    <input type="checkbox" id="correo-2" checked="">
                                    <label for="correo-2" class="cr"></label>
                                </div>
                                <label>Notificar por correo electr&oacute;nico</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Datos Bancarios Para Dep&oacute;sito</h5>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Banco</label>
                                <select name="banco_mantencion" id="banco_mantencion" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    @foreach($bancos as $banco)
                                        <option value="{{$banco->id}}">{{$banco->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                <input class="form-control form-control-sm" name="n_cta_mantencion" id="n_cta_mantencion" type="number" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sucursal</label>
                                <input class="form-control form-control-sm" name="sucursal_mantencion" id="sucursal_mantencion" type="text" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_mantencion()">Registrar Personal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    function registrar_mantencion(){
        let rut = $('#rut_mantencion').val();
        let fecha = $('#fecha_mantencion').val();
        let nombre = $('#nombre_mantencion').val();
        let apellido1 = $('#apellido1_mantencion').val();
        let apellido2 = $('#apellido2_mantencion').val();
        let tipo = $('#tipo_mantencion').val();
        let email = $('#email_mantencion').val();
        let telefono = $('#telefono_mantencion').val();
        let region = $('#region_mantencion').val();
        let comuna = $('#comuna_mantencion').val();
        let direccion = $('#direccion_mantencion').val();
        let numero = $('#numero_mantencion').val();
        let profesion = $('#profesion_mantencion').val();
        let funcion = $('#funcion_mantencion').val();
        let otra_funcion = $('#otra_funcion_mantencion').val();
        let horas_trabajadas = $('#horas_trabajadas_mantencion').val();
        let remuneracion = $('#remuneracion_mantencion').val();
        let banco = $('#banco_mantencion').val();
        let n_cta = $('#n_cta_mantencion').val();
        let sucursal = $('#sucursal_mantencion').val();

        let valido = 1;
        let mensaje = '';

        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Rut</li>';
        }
        if(fecha == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Fecha de Contrato</li>';
        }
        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Nombre</li>';
        }
        if(apellido1 == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Apellido Paterno</li>';
        }
        if(apellido2 == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Apellido Materno</li>';
        }
        if(tipo == '0'){
            valido = 0;
            mensaje += '<li>Debe Seleccionar Tipo</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Correo Electr&oacute;nico</li>';
        }
        if(telefono == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Tel&eacute;fono</li>';
        }
        if(region == '0'){
            valido = 0;
            mensaje += '<li>Debe Seleccionar Regi&oacute;n</li>';
        }
        if(comuna == '0'){
            valido = 0;
            mensaje += '<li>Debe Seleccionar Comuna</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Direcci&oacute;n</li>';
        }
        if(numero == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar N&uacute;mero</li>';
        }
        if(profesion == '0'){
            valido = 0;
            mensaje += '<li>Debe Seleccionar Profesi&oacute;n</li>';
        }
        if(funcion == '0'){
            valido = 0;
            mensaje += '<li>Debe Seleccionar Funci&oacute;n</li>';
        }
        if(funcion == 'VA' && otra_funcion == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Otra Funci&oacute;n</li>';
        }
        if(horas_trabajadas == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Horas Trabajadas</li>';
        }
        if(remuneracion == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Remuneraci&oacute;n</li>';
        }
        if(banco == '0'){
            valido = 0;
            mensaje += '<li>Debe Seleccionar Banco</li>';
        }
        if(n_cta == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar N&deg; Cuenta</li>';
        }
        if(sucursal == ''){
            valido = 0;
            mensaje += '<li>Debe Ingresar Sucursal</li>';
        }

        if(valido == 0){
            swal({
                title: "Error",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        let _token = "{{ csrf_token() }}";

        let url = "{{ route('adm_cm.registrar_personal_mantencion') }}";
        $.ajax({

                url: url,
                type: "post",
                data: {
                    _token: _token,
                    rut: rut,
                    fecha: fecha,
                    nombre: nombre,
                    apellido1: apellido1,
                    apellido2: apellido2,
                    tipo: tipo,
                    email: email,
                    telefono: telefono,
                    region: region,
                    comuna: comuna,
                    direccion: direccion,
                    numero: numero,
                    profesion: profesion,
                    funcion: funcion,
                    otra_funcion: otra_funcion,
                    horas_trabajadas: horas_trabajadas,
                    remuneracion: remuneracion,
                    banco: banco,
                    n_cta: n_cta,
                    sucursal: sucursal,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
                        swal({
                            title: "Registro Exitoso",
                            text: "Personal de Mantencion Registrado Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });

                        // alert('Personal de Mantención Registrado Correctamente');
                        $('#registrar_personalaseoymantencion').modal('hide');
                        $('#card_body_mantenedores_contratados').empty();
                        $('#card_body_mantenedores_contratados').append(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al Registrar Personal de Mantenci&oacute;n",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('Error al Registrar Personal de Mantención');
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al Registrar Personal de Mantenci&oacute;n",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('Error al Registrar Personal de Mantención');
                }
            });
    }

    function buscar_ciudad_mantencion(){
        let region = $('#region_mantencion').val();

        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#comuna_mantencion');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }
</script>
