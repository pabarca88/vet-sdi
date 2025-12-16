<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sistema || Redmedichile</title>
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">

    <!-- Formularios sm -->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}?t={{ time() }}">
</head>
<style type="text/css">
    .auth-wrapper {
        background-size: cover;
        background-image: url('{{ asset('images/background_5.jpg') }}');
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

</style>

<body>

    <div class="auth-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto ">
                    <!--Ingreso a Atención profesional no inscrito-->
                    <div class="card lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img src="{{ asset('images/iconos/p_no_inscrito.svg') }}" alt=""
                                        class="img-fluid mb-3 wid-60">
                                    <h5 class="text-info">Atención de profesional no registrado</h5>

                                    <p class="f-w-400 mb-4">Para acceder complete los campos</p>
                                </div>
                            </div>
                            <div class="row">
                               <form id="form-agregar-profesional-provisorio" action="{{ route('anonymous.agregar_profesional_provisorio') }}" method="POST">
                                    @csrf
                                <input type="hidden" id="token_profesional_provisorio" name="token_profesional_provisorio" value="{{$token}}">
                                <input type="hidden" id="id_registro" name="id_registro" value="{{$id_registro}}">

                                <div class="col-sm-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="text" class="form-control form-control-sm" name="rut_profesional" id="rut_profesional" value="{{$registro->rut}}" oninput="formatoRut(this)">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Nombres</label>
                                                <input type="text" class="form-control form-control-sm" name="nombre_profesional" id="nombre_profesional" value="{{$registro->nombre}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Primer Apellido</label>
                                                <input type="text" class="form-control form-control-sm" name="primer_apellido_profesional" id="primer_apellido_profesional" value="{{$registro->apellido_uno}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Segundo Apellidos</label>
                                                <input type="text" class="form-control form-control-sm" name="segundo_apellido_profesional" id="segundo_apellido_profesional" value="{{$registro->apellido_dos}}">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Sexo</label>
                                                <select id="sexo_profesional" name="sexo_profesional" class="form-control form-control-sm">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">Profesi&oacute;n</label>
                                                <select onchange="cargarListaEspecialidad()"  id="lista_profesion" name="lista_profesion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione una profesión</option>
                                                    @foreach ($profesion as $p)
                                                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">Especialidad</label>
                                                <select onchange="cargarListaSubEspecialidad()" id="lista_especialidad" name="lista_especialidad" class="form-control form-control-sm">
                                                    <option value="0">Especialidad</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label-activo-sm">Sub Especialidad</label>
                                                <select id="lista_sub_especialidad" name="lista_sub_especialidad" class="form-control form-control-sm">
                                                    <option value="0">Sub Especialidad</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Correo Electrónico</label>
                                                <input type="text" class="form-control form-control-sm" name="email_profesional" id="email_profesional" value="{{$registro->email}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Teléfono Pricipal</label>
                                                <input type="text" class="form-control form-control-sm" name="telefono_uno_profesional" id="telefono_uno_profesional" value="{{$registro->telefono_uno}}">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label-activo-sm">Teléfono Opcional</label>
                                                <input type="text" class="form-control form-control-sm" name="telefono_dos_profesional" id="telefono_dos_profesional" value="{{$registro->telefono_dos}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Dirección de consulta</label>
                                                <input type="address" value="{{$direccion_nombre}}" class="form-control form-control-sm" name="direccion_consulta_profesional" id="direccion_consulta_profesional" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">N&uacute;mero / Oficina</label>
                                                <input type="address" value="{{$direccion_numero}}" class="form-control form-control-sm" name="numero_dir_consulta_profesional" id="numero_dir_consulta_profesional" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select id="lista_region" onchange="cargarListaCiudades();" name="lista_region" class="form-control form-control-sm">
                                                    <option tion value="0">Seleccione una opción </option>
                                                    @if (count($regiones) > 0)
                                                        @foreach ($regiones as $region)
                                                            <option value="{{ $region->id }}">{{ $region->nombre }}
                                                            </option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Ciudad</label>
                                                <select id="lista_ciudades" name="lista_ciudades" class="form-control form-control-sm">
                                                    <option value="S">Seleccione una ciudad </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10 mx-auto mt-2">
                                                <button type="submit" onclick="actualizar()" class="btn btn-block btn-info mb-2 mx-auto">
                                                        Registrar
                                                </button>
                                                <!--
                                                <p class="mb-2 text-muted text-center">¿No has recibido los códigos de
                                                    seguridad?<br> podemos <a
                                                        href="envio_codigos_profesional_no_inscrito.php"
                                                        class="f-w-400"> volver a enviarlos</a></p>
                                                -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- Cierre: Ingreso a Atención profesional no inscrito-->
                </div>
            </div>
        </div>

    </div>

    @include('template.include.nocomplatible')

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css" rel="stylesheet"/>
    <script>


        var lista_profesion = [];
        @foreach ($profesion as $p)
            lista_profesion.push({"id":{{$p->id}},"nombre":"{{$p->nombre}}"});
        @endforeach

        var lista_especialidad = [];
        @foreach ($especialidad as $e)
            lista_especialidad.push({"id":{{$e->id}},"nombre":"{{$e->nombre}}","id_especialidad":"{{$e->id_especialidad}}"});
        @endforeach

        var lista_subespecialidad = [];
        @foreach ($subespecialidad as $se)
            lista_subespecialidad.push({"id":{{$se->id}},"nombre":"{{$se->nombre}}","id_tipo_especialidad":"{{$se->id_tipo_especialidad}}"});
        @endforeach

        var lista_ciudades = [];
        @foreach ($ciudades as $ci)
            lista_ciudades.push({"id":{{$ci->id}},"nombre":"{{$ci->nombre}}","id_region":"{{$ci->id_region}}"});
        @endforeach

        cargarListasProfesionEpecialidadSubespecialidad({{(int)$registro->id_especialidad}},{{(int)$registro->id_tipo_especialidad}},{{(int)$registro->id_sub_tipo_especialidad}});
        cargarListaRegionComuna({{(int)$id_region}},{{(int)$id_ciudad}});

        function cargarListaEspecialidad(){

            var id_profesion = $('#lista_profesion').val();

            $('#lista_especialidad').html('');

            lista_especialidad.forEach(e=>{
                if(e.id_especialidad==id_profesion)
                $('#lista_especialidad').append(`<option value="${e.id}">${e.nombre}</option>`);
            })

            cargarListaSubEspecialidad();
        }

        function cargarListaSubEspecialidad(){

            var id_especialidad = $('#lista_especialidad').val();

            $('#lista_sub_especialidad').html('');

            lista_subespecialidad.forEach(e=>{
                if(e.id_tipo_especialidad==id_especialidad)
                $('#lista_sub_especialidad').append(`<option value="${e.id}">${e.nombre}</option>`);
            })

        }

        function cargarListaCiudades(){

            var id_region = $('#lista_region').val();

            $('#lista_ciudades').html('');

            lista_ciudades.forEach(e=>{
                if(e.id_region==id_region)
                $('#lista_ciudades').append(`<option value="${e.id}">${e.nombre}</option>`);
            })

        }

        function cargarListasProfesionEpecialidadSubespecialidad(id_profesion,id_especialidad,id_subespecialidad)
        {

            $('#lista_profesion').val(id_profesion);

            $('#lista_especialidad').html('');

            lista_especialidad.forEach(e=>{
                if(e.id_especialidad==id_profesion)
                {
                    if(e.id == id_especialidad)
                    {
                        $('#lista_especialidad').append(`<option value="${e.id}" selected>${e.nombre}</option>`);
                    }else{
                        $('#lista_especialidad').append(`<option value="${e.id}">${e.nombre}</option>`);
                    }
                }
            })

            $('#lista_sub_especialidad').html('');

            lista_subespecialidad.forEach(e=>{
                if(e.id_tipo_especialidad==id_especialidad){

                    if(e.id == id_subespecialidad)
                    {
                        $('#lista_sub_especialidad').append(`<option value="${e.id}" selected>${e.nombre}</option>`);
                    }else{
                        $('#lista_sub_especialidad').append(`<option value="${e.id}">${e.nombre}</option>`);
                    }
                }
            })


        }

        function cargarListaRegionComuna(id_region,id_ciudad){
            $('#lista_region').val(id_region);

            $('#lista_ciudades').html('');

            lista_ciudades.forEach(e=>{
                if(e.id_region==id_region)
                {
                    if(e.id==id_ciudad)
                    {
                        $('#lista_ciudades').append(`<option value="${e.id}" selected>${e.nombre}</option>`);
                    }else{
                        $('#lista_ciudades').append(`<option value="${e.id}">${e.nombre}</option>`);
                    }
            }
            })
        }

        function actualizar(){

            event.preventDefault()

            var datos = {};

            var rut = $.trim($('#rut_profesional').val());
            var nombre  = $.trim($('#nombre_profesional').val());
            var apellido_uno  = $.trim($('#primer_apellido_profesional').val());
            var apellido_dos = $.trim($('#segundo_apellido_profesional').val());
            var sexo = $.trim($('#sexo_profesional').val());

            var id_especialidad = $('#lista_profesion').val();
            var id_tipo_especialidad = $('#lista_especialidad').val();
            var id_sub_tipo_especialidad = $('#lista_sub_especialidad').val();

            var email = $.trim($('#email_profesional').val());
            var telefono_uno = $.trim($('#telefono_uno_profesional').val());
            var telefono_dos = $.trim($('#telefono_dos_profesional').val());
            var direccion = $.trim($('#direccion_consulta_profesional').val());
            var numero_dir = $.trim($('#numero_dir_consulta_profesional').val());
            var id_region = $('#lista_region').val();
            var id_ciudad = $('#lista_ciudades').val();

            if(validaRut(rut)==false)
            {
                msg('Validar campo','Debe ingresar un rut valido.','error');
                $('#rut_profesional').select().focus();
                return false;
            }

            if(nombre=='')
            {
                msg('Validar campo','Debe ingresar un nombre.','error');
                $('#nombre_profesional').select().focus();
                return false;
            }

            if(apellido_uno=='')
            {
                msg('Validar campo','Debe ingresar un apellido.','error');
                $('#primer_apellido_profesional').select().focus();
                return false;
            }

            if(apellido_dos=='')
            {
                msg('Validar campo','Debe ingresar el segundo apellido.','error');
                $('#segundo_apellido_profesional').select().focus();
                return false;
            }

            if(id_especialidad==0)
            {
                msg('Validar campo','debe seleccionar una profesión.','error');
                $('#lista_profesion').select().focus();
                return false;
            }

            if(id_tipo_especialidad==0)
            {
                msg('Validar campo','debe seleccionar una especialidad.','error');
                $('#lista_especialidad').select().focus();
                return false;
            }

            if(id_sub_tipo_especialidad==0)
            {
                msg('Validar campo','debe seleccionar una sub tipo especialidad.','error');
                $('#lista_sub_especialidad').select().focus();
                return false;
            }

            if(validarEmail(email)==false)
            {
                msg('Validar campo','Debe ingresar un email valido.','error');
                $('#email_profesional').select().focus();
                return false;
            }

            if(telefono_uno=='')
            {
                msg('Validar campo','Debe ingresar el telefono uno.','error');
                $('#telefono_uno_profesional').select().focus();
                return false;
            }

            if(telefono_dos=='')
            {
                msg('Validar campo','Debe ingresar el telefono dos.','error');
                $('#telefono_dos_profesional').select().focus();
                return false;
            }

            if(direccion=='')
            {
                msg('Validar campo','Debe ingresar una dirección.','error');
                $('#direccion_consulta_profesional').select().focus();
                return false;
            }

            if(numero_dir=='')
            {
                msg('Validar campo','Debe ingresar el numero dir.','error');
                $('#numero_dir_consulta_profesional').select().focus();
                return false;
            }

            if(id_region==0)
            {
                msg('Validar campo','debe seleccionar una región.','error');
                $('#lista_region').select().focus();
                return false;
            }

            if(id_ciudad==0)
            {
                msg('Validar campo','debe seleccionar una ciudad.','error');
                $('#lista_ciudades').select().focus();
                return false;
            }


            $('#form-agregar-profesional-provisorio').submit();
        }

        function resetForm(){
            $('#rut_profesional').val('');
            $('#nombre_profesional').val('');
            $('#primer_apellido_profesional').val('');
            $('#segundo_apellido_profesional').val('');
            $('#lista_profesion').val(0);
            $('#lista_especialidad').val('');
            $('#lista_sub_especialidad').val('');
            $('#email_profesional').val('');
            $('#telefono_uno_profesional').val('');
            $('#telefono_dos_profesional').val('');
            $('#direccion_consulta_profesional').val('');
            $('#numero_dir_consulta_profesional').val('');
            $('#lista_region').val(0);
            $('#lista_ciudades').val('');

        }

        function msg(title,text,type)
        {
            swal({
                            title: title,
                            text: text,
                            icon: type,
                            buttons: "Aceptar",
                            DangerMode: true,
                });
        }

function validaRut(rut) {
    rut = String(rut);
    var valor = rut.replace(".", "").replace(".", "");
    valor = valor.replace("-", "");
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();
    rut = cuerpo + "-" + dv;
    if (cuerpo.length < 7) {
        return false;
    }
    suma = 0;
    multiplo = 2;
    for (i = 1; i <= cuerpo.length; i++) {
        index = multiplo * valor.charAt(cuerpo.length - i);
        suma = suma + index;
        if (multiplo < 7) {
            multiplo = multiplo + 1;
        } else {
            multiplo = 2;
        }
    }
    dvEsperado = 11 - suma % 11;
    dv = dv == "K" ? 10 : dv;
    dv = dv == 0 ? 11 : dv;
    if (dvEsperado != dv) {
        return false;
    }
    return true;
}

function validarEmail(valor) {
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
        return true;
    } else {
        return false;
    }
}

function justNumbers(e){
    var keynum = window.event ? window.event.keyCode : e.which;
    var telefono_num = $('#telefono').val().length;
    if(telefono_num < 8 ){
        if((keynum == 8) || (keynum == 46)){
            return true;
        }else{
            return /\d/.test(String.fromCharCode(keynum));
        }
    }else{
        return /\d/.test('');
    }
}

    function formato_rut(div)
    {
        var sRut1 = $('#'+div).val();
        sRut1=sRut1.replace('-', '');// se elimina el guion
        sRut1=sRut1.replace('.', '');// se elimina el primer punto
        sRut1=sRut1.replace('.', '');// se elimina el segundo punto
        sRut1 = sRut1.replace(/k$/,"K");
        document.getElementById("rut").value=sRut1;
    //contador de para saber cuando insertar el . o la -
        var nPos = 0;
    //Guarda el rut invertido con los puntos y el gui&oacute;n agregado
        var sInvertido = "";
    //Guarda el resultado final del rut como debe ser
        var sRut = "";
        for(var i = sRut1.length - 1; i >= 0; i-- )
        {
            sInvertido += sRut1.charAt(i);
            if (i == sRut1.length - 1 )
                sInvertido += "-";
            else if (nPos == 3)
            {
                sInvertido += ".";
                nPos = 0;
            }
            nPos++;
        }
        for(var j = sInvertido.length - 1; j >= 0; j-- )
        {
            if (sInvertido.charAt(sInvertido.length - 1) != ".")
                sRut += sInvertido.charAt(j);
            else if (j != sInvertido.length - 1 )
                sRut += sInvertido.charAt(j);
        }
    //Pasamos al campo el valor formateado
        $('#'+div).val(sRut.toUpperCase());
    }

        /*
        function buscar_ciudades() {

            let region = $('#region_no_inscrito').val();
            let url = "{{ route('profesional.buscar_ciudad_region') }}";
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

                        let ciudades = $('#ciudad_no_inscrito');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="">Seleccione</option>');
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

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };
        */
    </script>
</body>

</html>
