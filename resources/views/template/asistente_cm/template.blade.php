<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDI | Asistente</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI | Asistente Jefe" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"> </script>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_asistente.css') }}?t={{ time() }} /">
    <link rel="stylesheet" href="{{ asset('css/plugins/ekko-lightbox.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/plugins/lightbox.min.css') }}"/>
    <link rel='stylesheet' href='{{ asset('js/fullcalendar-5.10.1/lib/main.css') }}'/>

    <!-- select2 selectbonito css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}" />

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}"/>

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/dropzone.css" type="text/css" /> -->

    <link rel="stylesheet" href="{{ asset('css/pills_modals.css') }}"/>

    {{-- estilos de atencion medica --}}
    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}"/>

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

   {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('page-styles')

    <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">

    <style>
        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            {{--  margin: 40px auto;  --}}
        }

        /* kill the scrollbars and allow natural height */
        .fc-scroller,
        .fc-day-grid-container,
        /* these divs might be assigned height, which we need to cleared */
        .fc-time-grid-container {
            /* */
            overflow-x: hidden;
            overflow-y: auto !important;
            height: auto !important;
        }

        /* kill the horizontal border/padding used to compensate for scrollbars */
        .fc-row {
            border: 0 !important;
            margin: 0 !important;
        }

        .fc .fc-timegrid-slot {
            height: 3.5em;
        }
    </style>
</head>
<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    {{--  @include('template.asistente_cm.menu')  --}}
    @include('template.asistente_cm.menu')
    @include('template.asistente_cm.header')

    @yield('content')
    @yield('modales')

    <footer>
        {{--  @include('template.include.footer')  --}}
    </footer>

    @include('template.include.nocomplatible')

    <!-- Scripts -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- ekko-lightbox Js -->
	<script src="{{ asset('js/plugins/ekko-lightbox.min.js') }}"></script>
	<script src="{{ asset('js/plugins/lightbox.min.js') }}"></script>
	<script src="{{ asset('js/pages/ac-lightbox.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>

    <!-- mensajes -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- apertura y cierre de div -->
    <script src="{{ asset('js/toggle_asistentes.js') }}"></script>
	<!-- tablas asistentes flujo caja -->
    <script src="{{ asset('js\tablas_asistentes.js') }}"></script>
    <!--full calendar 5-->

    <script src='{{ asset('js\fullcalendar-5.10.1\lib\main.js') }}'></script>
	<script src='{{ asset('js\fullcalendar-5.10.1\lib\locales\es.js') }}'></script>

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>
    <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

    <!-- momnent -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- autocomplete -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- select2 -->
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>

    <!-- rut -->
    <script src="{{ asset('js/rut.js') }}"></script>
    <script src="{{ asset('js/validaRut.js') }}"></script>

    <!-- funciones generales -->
    <script src="{{ asset('js/funciones.js') }}"></script>

    <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>

	<script src="{{ asset('js/jQuery-Mask-Plugin-master/jquery.mask.js') }}"></script>
 
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var info_profesional_seleccionado = [];

        $(document).ready(function()
        {
            $('.loader-bg').hide();

            $(".cerrar_modal_info_profesional").click(function() {
                $("#info_profesional").modal('hide');
            });

        });

        function DateFormatVista(dateStr) {
            let parts = dateStr.split('-');

            if (parts.length !== 3) {
                console.log('Invalid date format');
            }

            let year = parts[0];
            let month = parts[1];
            let day = parts[2];

            let formattedDate = `${day}/${month}/${year}`;

            return formattedDate;
        }

        function formatDateDB(dateStr) {
            // Dividir la fecha en partes
            let parts = dateStr.split('/');

            // Verificar que la fecha tenga el formato correcto
            if (parts.length !== 3) {
                throw new Error('formato invalido');
            }

            let day = parts[0];
            let month = parts[1];
            let year = parts[2];

            // Formatear la nueva fecha
            let formattedDate = `${year}-${month}-${day}`;

            return formattedDate;
        }

        {{--  VER DETALLE PROFESIONAL  --}}
        function info_profesional(id)
        {
            let id_profesional = id;

            let url = "{{ route('agenda.buscar_informacion_profesional') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_profesional: id_profesional,
                }
            })
            .done(function(data) {
                if (data.estado == 1)
                {

                    console.log(data);
                    var rut = '';
                    var lugares_atencion = '';
                    var telefono = '';
                    var email = '';

                    rut = data.profesional.rut;
                    telefono = data.profesional.telefono_uno;
                    email = data.profesional.email;

                    $.each(data.lugares_atencion, function( index, lugar_at ) {
                        lugares_atencion += '<li>';
                        lugares_atencion += '  <strong>'+lugar_at.nombre+':</strong> ' +lugar_at.direccion_texto +'<br>';
                        lugares_atencion += '  <strong>Tipo : </strong> ' +lugar_at.tipo_texto +'<br>';
                        lugares_atencion += '  <strong>Telefono:</strong> ' +lugar_at.telefono +'<br>';
                        lugares_atencion += '  <strong>Convenios:</strong> ' +lugar_at.convenios +'<br>';
                        lugares_atencion += '</li><hr>';
                    });

                    $('#info_profesional_rut').html(rut);
                    $('#info_profesional_lugares_atencion').html(lugares_atencion);
                    $('#info_profesional_telefono').html('<li>'+telefono+'</li>');
                    $('#info_profesional_email').html('<li>'+email+'</li>');
                    $('#info_profesional').modal('show');
                }
                else
                {
                    swal({
                        title: "Informacion del Profesional no encontrada",
                        icon: "error",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function buscar_ciudad_general(input_region, input_ciudad, id_ciudad=0)
        {
            var region = $('#'+input_region).val();
            console.log(region);
            let url = "{{ route('home.buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#'+input_ciudad);

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })

                    if(id_ciudad != 0)
                    {
                        ciudades.val(id_ciudad);
                    }
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };
    </script>
    @yield('page-script')
    @yield('btn-script-agenda')
</body>
</html>
