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
                                <div class="col-sm-12">
                                    <form method="post"
                                        action="{{ route('atencion_medica.ficha_atencion_profesional_no_inscrito') }}">
                                        @csrf
                                        @if (isset($mensaje))
                                            <div class="form-row">
                                                <span class="error"> {{ $mensaje }}</span>

                                            </div>
                                        @endif
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Rut</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="rut_profesional" id="rut_profesional">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">Nombres</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_profesional" id="nombre_profesional">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Primer Apellido</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="primer_apellido_profesional" id="primer_apellido_profesional">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Segundo Apellidos</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="segundo_apellido_profesional"
                                                    id="segundo_apellido_profesional">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">Profesi&oacute;n</label>
                                                <select id="especialidad_profesional" name="especialidad_profesional"
                                                    class="form-control form-control-sm">
                                                    <option selected>Seleccione una profesi&oacute;n </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">Especialidad</label>
                                                <select id="especialidad_profesional" name="especialidad_profesional"
                                                    class="form-control form-control-sm">
                                                    <option selected>Especialidad</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">Correo Electrónico</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="email_profesional" id="email_profesional">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Teléfono Pricipal</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="telefono_uno_profesional" id="telefono_uno_profesional">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="floating-label">Teléfono Opcional</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="telefono_dos_profesional" id="telefono_dos_profesional">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">Dirección de consulta</label>
                                                <input type="address" class="form-control form-control-sm"
                                                    name="direccion_consulta_profesional"
                                                    id="direccion_consulta_profesional">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">N&uacute;mero / Oficina</label>
                                                <input type="address" class="form-control form-control-sm"
                                                    name="numero_dir_consulta_profesional"
                                                    id="numero_dir_consulta_profesional">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label-activo-sm">Región</label>
                                                <select id="region_no_inscrito" onclick="buscar_ciudades();"
                                                    name="region_no_inscrito" class="form-control form-control-sm">
                                                    <option tion value="">Seleccione una opción </option>
                                                    @if (count($regiones) > 0)
                                                        @foreach ($regiones as $region)
                                                            <option value="{{ $region->id }}">{{ $region->nombre }}
                                                            </option>
                                                        @endforeach

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">Ciudad</label>
                                                <select id="ciudad_no_inscrito" name="ciudad_no_inscrito"
                                                    class="form-control form-control-sm">
                                                    <option tion value="S">Seleccione una ciudad </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-10 mx-auto mt-2">
                                                <button type="submit" class="btn btn-block btn-info mb-2 mx-auto">
                                                    Acceder a atención de profesional no registrado
                                                </button>
                                                <p class="mb-2 text-muted text-center">¿No has recibido los códigos de
                                                    seguridad?<br> podemos <a
                                                        href="envio_codigos_profesional_no_inscrito.php"
                                                        class="f-w-400"> volver a enviarlos</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
    <script>
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
    </script>
</body>

</html>
