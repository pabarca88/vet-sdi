<div id="registrar_contratoasistentes" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="registrar_contratoasistentes" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Registrar Contrato Nuevo/a Asistente</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="text" oninput="formatoRut(this)" class="form-control form-control-sm"
                                    name="rut_asistente" id="rut_asistente">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha Ingreso</label>
                                <input type="date" class="form-control form-control-sm"
                                    name="f_ingreso_asistente" id="f_ingreso_asistente">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="nombre_asistente"
                                    id="nombre_asistente" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Paterno</label>
                                <input class="form-control form-control-sm" name="apellido1"
                                    id="apellido1" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Apellido Materno</label>
                                <input class="form-control form-control-sm" name="apellido2"
                                    id="apellido2" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                <input class="form-control form-control-sm" name="email_asistente" id="email_asistente"
                                    type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input class="form-control form-control-sm" name="telefono_asistente"
                                    id="telefono_asistente" type="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm" name="region_asistente"
                                    id="region_asistente" onchange="buscar_ciudad_asistente();">
                                    <option>Seleccione una opción</option>
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm" name="ciudad_asistente"
                                    id="ciudad_asistente">
                                    <option>Seleccione una opción</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección / Calle</label>
                                <input class="form-control form-control-sm" name="direccion_asistente" id="direccion_asistente"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Número / Dpto.</label>
                                <input class="form-control form-control-sm" name="numero_asistente" id="numero_asistente"
                                    type="text">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h5>Tipo Contrato</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Profesión</label>
                                    <select class="form-control form-control-sm" name="profesion_asistente" id="profesion_asistente" onchange="evaluar_profesion(this)">
                                        <option value="0">Seleccione opción</option>
                                        <option value="AL">Secretaria</option>
                                        <option value="LA">Secretaria Comercial</option>
                                        <option value="VA">Secretaria Asistente Dental</option>
                                        <option value="VA">Personal Administrativo</option>
                                        <option value="OTRA">Otra</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-none" id="otra_profesion_asistente">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Otra Profesión</label>
                                <input class="form-control form-control-sm" name="ot_profesion" id="ot_profesion"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Función Asignada</label>
                                <select class="form-control form-control-sm" name="funcion_asistente" id="funcion_asistente" onchange="evaluar(this)">
                                    <option value="0">Seleccione opción</option>
                                    <option value="AL">Secretaria Recepción</option>
                                    <option value="LA">Secretaria Administración</option>
                                    <option value="LA">Secretaria Caja</option>
                                    <option value="VA">Asistente Dental</option>
                                    <option value="OTRA">Otra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 d-none" id="otra_funcion_asistente">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"> Otra Función</label>
                                <input class="form-control form-control-sm" name="ot_func" id="ot_func"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Horas contratadas</label>
                                <input type="number" class="form-control form-control-sm" name="horas_contrato_asistente"
                                    id="horas_contrato_asistente">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Remuneración</label>
                                <input class="form-control form-control-sm" name="remuneracion_asistente" id="remuneracion_asistente"
                                    type="text">
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
                                <select name="banco_asistente" id="banco_asistente" class="form-control">
                                    <option value="0">Seleccione</option>
                                    @foreach ($bancos as $banco)
                                        <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Cuenta</label>
                                <input class="form-control form-control-sm" name="n_cta_asistente" id="n_cta_asistente"
                                    type="number">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Sucursal</label>
                                <input class="form-control form-control-sm" name="sucursal_asistente" id="sucursal_asistente"
                                    type="text">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info" onclick="registrar_nuevo_asistente()">Registrar asistente</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar_ciudad_profesional(id_ciudad = 0) {

        let region = $('#region_asistente').val();
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
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_asistente');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
                        ciudades.val(id_ciudad);

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



    };

    function buscar_ciudad_asistente(){
        let region = $('#region_asistente').val();

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

                    let ciudades = $('#ciudad_asistente');

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

    function registrar_nuevo_asistente(){
        let rut = $('#rut_asistente').val();
        let nombre = $('#nombre_asistente').val();
        let fecha_ingreso = $('#f_ingreso_asistente').val();
        let apellido_materno = $('#apellido1').val();
        let apellido_paterno = $('#apellido2').val();
        let email = $('#email_asistente').val();
        let telefono = $('#telefono_asistente').val();
        let region = $('#region_asistente').val();
        let ciudad = $('#ciudad_asistente').val();
        let direccion = $('#direccion_asistente').val();
        let numero = $('#numero_asistente').val();
        let profesion = $('#profesion_asistente').val();
        let funcion = $('#funcion_asistente').val();
        let otro_func = $('#ot_func').val();
        let horas_contrato = $('#horas_contrato_asistente').val();
        let remuneracion = $('#remuneracion_asistente').val();
        let funcion_asignada = $('#funcion_asignada_asistente').val();
        let banco = $('#banco_asistente').val();
        let n_cta = $('#n_cta_asistente').val();
        let sucursal = $('#sucursal_asistente').val();
        let _token = "{{ csrf_token() }}";

        let valido = 1;
        let mensaje = '';

        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el rut del asistente</li>';
        }
        if(nombre == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el nombre del asistente</li>';
        }
        if(fecha_ingreso == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la fecha de ingreso del asistente</li>';
        }
        if(apellido_paterno == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el apellido del asistente</li>';
        }
        if(apellido_materno == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el apellido del asistente</li>';
        }
        if(email == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el email del asistente</li>';
        }
        if(telefono == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el telefono del asistente</li>';
        }
        if(region == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la región del asistente</li>';
        }
        if(ciudad == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la ciudad del asistente</li>';
        }
        if(direccion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la dirección del asistente</li>';
        }
        if(numero == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el número de la dirección del asistente</li>';
        }
        if(profesion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la profesión del asistente</li>';
        }
        if(funcion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la función del asistente</li>';
        }
        if(horas_contrato == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar las horas de contrato del asistente</li>';
        }
        if(remuneracion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la remuneración del asistente</li>';
        }
        if(funcion_asignada == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la función asignada del asistente</li>';
        }
        if(banco == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el banco del asistente</li>';
        }
        if(n_cta == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el número de cuenta del asistente</li>';
        }
        if(sucursal == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar la sucursal del asistente</li>';
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
            })
            return;
        }

        let url = "{{ route('adm_cm.registrar_asistente') }}";
        $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: _token,
                    rut: rut,
                    nombre: nombre,
                    fecha_ingreso: fecha_ingreso,
                    apellido_materno: apellido_materno,
                    apellido_paterno: apellido_paterno,
                    email: email,
                    telefono: telefono,
                    region: region,
                    ciudad: ciudad,
                    direccion: direccion,
                    numero: numero,
                    profesion: profesion,
                    funcion: funcion,
                    otro_func: otro_func,
                    horas_contrato: horas_contrato,
                    remuneracion: remuneracion,
                    funcion_asignada: funcion_asignada,
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
                            title: "Contrato registrado",
                            text: data.msj,
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        $('#card_body_asistentes_contratados').empty();
                        $('#card_body_asistentes_contratados').html(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al registrar el contrato",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }
                } else {

                    swal({
                        title: "Error",
                        text: "Error al registrar el contrato",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
    }

    function evaluar(element){
        let valor = $(element).val();
        if(valor == 'OTRA'){
            $('#otra_funcion_asistente').removeClass('d-none');
        }else{
            $('#otra_funcion_asistente').addClass('d-none');
        }
    }

    function evaluar_profesion(element){
        let valor = $(element).val();
        if(valor == 'OTRA'){
            $('#otra_profesion_asistente').removeClass('d-none');
        }else{
            $('#otra_profesion_asistente').addClass('d-none');
        }
    }

    function eliminar_asistente(id){
        swal({
            title: "Eliminar Asistente",
            text: "¿Está seguro de eliminar el asistente?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_asistente(id);
            }
        });
    }

    function confirmar_eliminar_asistente(id){
        let _token = "{{ csrf_token() }}";

        let url = "{{ route('adm_cm.eliminar_asistente') }}";
        $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: _token,
                    id: id,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {

                    if (data.estado == 1) {
                        swal({
                            title: "Asistente eliminado",
                            text: data.msj,
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        $('#card_body_asistentes_contratados').empty();
                        $('#card_body_asistentes_contratados').html(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al eliminar el asistente",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }
                } else {

                    swal({
                        title: "Error",
                        text: "Error al eliminar el asistente",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
    }
</script>
