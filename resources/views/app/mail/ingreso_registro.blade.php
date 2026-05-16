<!DOCTYPE html>
<html lang="es">

<head>
    <title>SDI</title>
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
    <meta name="author" content="SDI" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}?t=<?= time() ?>">
</head>
<style type="text/css">
    .auth-wrapper {
        background-size: cover;
        background-image: url("{{ asset('images/background_1.jpg') }}");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .es-invalido {
        border-color: #ff5252;
        padding-right: calc(1.5em + 1.25rem);
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.3125rem) center;
        background-size: calc(0.75em + 0.625rem) calc(0.75em + 0.625rem);
    }

    .error {
        color: red;
    }

</style>

<body>
    <div class="blur-bg-images"></div>
    <div class="auth-wrapper">
        <div class="auth-content">
            <!-- Ingreso a Medichile -->
            <div class="card text-center" id="ingreso">
                <div class="card-body">
                    <img src="{{ asset('images/logo_pais_vertical.png') }}" alt="" class="img-fluid mb-4 wid-100">
                    <h5 class="mb-3 f-w-400">¡Bienvenido a Vet SDI!</h5>
                    <!-- mensaje -->
                    <div class="row div_mensaje">
                        @if(session('mensaje'))
                            <span class="col-sm-12 alert alert-success"> {{ session('mensaje') }}</span>
                        @endif
                    </div>
                    <!-- Ingreso -->
                    <div class="toggle-block">
                        <ol class="position-relative carousel-indicators justify-content-center">
                            <li class="toggle-btn"></li>
                            <li class="active"></li>
                        </ol>

                        <div class="form-group mb-3">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Ingrese su correo electrónico</label>
                                    <input type="text" class="form-control" name="email" id="email" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Ingrese su contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        value="">
                                </div>
                                <button class="btn btn-info mb-4" id="btn-ingresar">Ingresar</button>
                                {{--  <button id="registrar" class="btn btn-outline-info mb-4 toggle-btn">¡Quiero registrarme!</button>  --}}
                            </form>

                            <p class="mb-2 text-muted">¿Olvidó su contraseña? <div style="cursor: pointer;" onclick="activar_recuperacion();" class="f-w-400">¡Recuperela!</div></p>
                        </div>

                    </div>
                    <!-- Cierre:Ingreso -->

                    <!-- Registro -->
                    <div class="toggle-block collapse">
                        {{-- <ol class="position-relative carousel-indicators justify-content-center">
                            <li class="active"></li>
                            <li class="toggle-btn"></li>
                        </ol> --}}
                        <form method="post" action="{{ route('home.registro') }}" id="form_registro" name="form_registro">
                            @csrf
                            {{-- <div class="form-group mb-3">
                                <label class="floating-label">Nombre de usuario</label>
                                <input type="text" class="form-control" name="nombre_registro" id="nombre_registro">
                            </div> --}}

                            <div class="form-group mb-3">
                                <label class="floating-label-activo-sm">Correo electrónico</label>
                                <input type="email" class="form-control" name="email_registro" id="email_registro">
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label-activo-sm">Contraseña</label>
                                <input type="password" class="form-control" name="password_registro"
                                    id="password_registro">
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label-activo-sm">Confirme su contraseña</label>
                                <input type="password" class="form-control" name="password_confirmacion_registro"
                                    id="password_confirmacion_registro">
                            </div>

                            <div class="form-group mb-3">
                                <label class="floating-label-activo-sm">Tipo Usuario</label>
                                <select class="form-control form-control-sm" name="cuenta_registro" id="cuenta_registro">
                                    <option value="0">Seleccione</option>
                                    {{-- <option value="1">Administrador</option> --}}
                                    <option value="2">Paciente</option>
                                    <option value="3">Profesional</option>
                                    <option value="4">Asistente</option>
                                    <option value="5">Institución</option>
                                    <option value="6">Servicio</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                {{--  <button type="submit" class="btn btn-info mb-4" value="Registrarme" disabled>Registrarme</button>  --}}
                                <button type="button" class="btn btn-outline-info mb-4 toggle-btn">Tengo una cuenta</button>
                            </div>
                        </form>


                    </div>
                    <!-- Registro -->
                </div>
            </div>
            <!-- Cierre: Ingreso a Medichile -->


            <!-- recuperar contraseña usuario -->
            <div class="card text-center" id="recuperar" style="display: none;">
                <div class="card-body">
                    <img src="{{ asset('images/logo_pais_vertical.png') }}" alt="" class="img-fluid mb-4 wid-100">
                    <h5 class="mb-3 f-w-400">¡Recuperación Contraseña!</h5>
                    <!-- mensaje -->
                    <div class="row div_mensaje">
                        @if(session('mensaje'))
                            <span class="col-sm-12 alert alert-success"> {{ session('mensaje') }}</span>
                        @endif
                    </div>
                    <!-- recupeación contraseña -->
                    <div class="">
                        <div class="form-group mb-3">

                            <form method="POST" action="{{ route('home.recuperar_contrasena') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="floating-label-activo-sm">Ingrese su correo electrónico</label>
                                    <input type="email" class="form-control" name="email" id="email" value="">
                                </div>

                                <button type="submit" class="btn btn-success mb-4" id="btn-solicitar">Solicitar</button>

                                <button type="button" class="btn btn-outline-info mb-4" id="btn-regresar" onclick="regresar_ingreso();">Regresar</button>

                            </form>
                        </div>

                    </div>
                    <!-- Cierre:recupeación contraseña -->
                </div>
            </div>
            <!-- Cierre: recuperar contraseña usuario -->

        </div>
    </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.j') }}s"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/login/registro.js') }}?"></script>
    <script>
        $(".toggle-btn").on("click", function() {
            $(".toggle-block").toggle();
        });

        $("#registrar").on("click", function(e) {
            e.preventDefault();
        });

        function activar_recuperacion()
        {
            $('#ingreso').hide();
            $('#recuperar').show();
        }

        function regresar_ingreso()
        {
            $('#ingreso').show();
            $('#recuperar').hide();
        }

        $(document).ready(function() {
            var $validacion = $("#form_registro").validate({
                rules: {
                    email_registro: {
                        required: true,
                        email: true,
                        validarEmail: true
                    },
                    password_registro: {
                        required: true,
                        minlength: 3
                    },
                    password_confirmacion_registro: {
                        required: true,
                        minlength: 3,
                        equalTo: "#password_registro"
                    },
                    cuenta_registro: {
                        required: true,
                        cuenta_registro: true
                    }
                },
                messages: {
                    email_registro: {
                        required: "Ingrese su email",
                        email: "Cuenta de correo no es Valida.",
                        {{--  validarEmail: "Correo ya esta siendo utilizado"  --}}

                    },
                    password_registro: {
                        required: "Ingrese su contraseña",
                        minlength: "Debe poseer por lo menos 3 caracteres"

                    },
                    password_confirmacion_registro: {
                        required: "Ingrese su confirmacion de contraseña",
                        minlength: "Debe poseer por lo menos 3 caracteres",
                        equalTo: "Las Contraseñas no son iguales"
                    },
                    cuenta_registro: {
                        required: "Ingrese su Tipo Usuario",
                    }
                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                        $el.parent().addClass("es-invalido");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    $('#submit').attr('disabled', 'disabled');
                    form.submit();
                }
            });

            jQuery.validator.addMethod("cuenta_registro", function(value, element) {
                if (value == 0)
                    return false;
                else
                    return true;
            }, "Seleccione Tipo Usuario");

            jQuery.validator.addMethod("validarEmail", function(value, element) {
                var validator = this;
                let url = "{{ route('home.buscar_user_email') }}";
                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            email: value,
                        },
                    })
                    .done(function(data) {

                        if (data.estado == 1) {
                            $.each(data.roles_actuales, function(index, value) {
                                $("#cuenta_registro option[value='" + value[0] + "']").remove();
                            });

                            $('#password_registro').val('123').attr('disabled', 'disabled');
                            $('#password_confirmacion_registro').val('123').attr('disabled', 'disabled');
                            {{--  validator.showErrors('En correo ya tiene un usuario asociado, seleccione otro tipo de usuario');  --}}
                            $('.div_mensaje').html('<span class="alert alert-warning" style="padding: 10px !important;">Correo inscrito, seleccione tipo de usuario</span>');

                        } else {
                            $("#cuenta_registro").html('');
                            $("#cuenta_registro").html('<option value="0">Seleccione</option><option value="2">Paciente</option><option value="3">Profesional</option><option value="4">Asistente</option><option value="5">Institución</option><option value="6">Servicio</option>');
                            $('#password_registro').attrRemove('disabled');
                            $('#password_confirmacion_registro').attrRemove('disabled');
                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);
                    });
                    return true;
            }, "En correo ya tiene un usuario asociado, seleccione otro tipo de usuario");

        });

    </script>

</body>
