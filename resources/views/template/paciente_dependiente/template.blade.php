<!DOCTYPE html>

<html lang="es">



<head>

    <title>VET-SDI | MIS MASCOTAS</title>

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

    <meta name="author" content="SDI"/>

    <link rel="icon" href="{{ asset('assets/images/sdi-icon.png') }}" type="image/x-icon">



    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />

    <link rel="stylesheet" href="{{ asset('css/escritorio_paciente.css') }}?t={{ time() }}" />



    <meta name="csrf-token" content="{{ csrf_token() }}">



    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">

    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">



    <!-- data tables css -->

    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">



    <!--Accordion-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}?t={{ time() }}">



    <!--Card Sidebar-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}?t={{ time() }}">



    <!--Pills Modals-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}?t={{ time() }}">



    <!--Tab wizard_formularios-->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}?t=<?= time() ?>">



    <!--Bs-Canvas-->

    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}?t={{ time() }}">


  <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">


    @yield('page-styles')



    <!-- flatpickr -->

    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">





</head>



<body>

    <div class="loader-bg">

        <div class="loader-track">

            <div class="loader-fill">

            </div>

        </div>

    </div>

    @include('template.paciente_dependiente.header')

    @include('template.paciente_dependiente.menu')



    @yield('content')



    <footer>

        <!-- @include('template.include.footer') -->

    </footer>



    @include('template.include.nocomplatible')



    <!-- Required Js -->

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>

    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/ripple.js') }}"></script>

    <script src="{{ asset('js/pcoded.min.js') }}"></script>



    <!-- datatable Js -->

    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>

    <!-- <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script> -->



    <!--Form wizard-->

    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>

    <script src="{{ asset('js/formularios_wizard.js') }}"></script>



    <!-- datepicker js -->

    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>

    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>

    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>



    <!--Tooltips-->

    <script src="{{ asset('js/tooltip_atencion_medica.js') }}"></script>



    <!--Check-->

    <script src="{{ asset('js/check_atencion_medica.js') }}"></script>



    <!-- file-upload Js -->

    <script src="{{ asset('js/plugins/dropzone-amd-module.min.js') }}"></script>



    <!-- mensajes -->

    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>



    <!--Botón cards-->

    <script src="{{ asset('js/btn-cards.js') }}"></script>



    <!-- rut -->

    <script src="{{ asset('js/rut.js') }}"></script>



    <!-- funciones generales -->

    <script src="{{ asset('js/funciones.js') }}"></script>



    <!-- Scripts -->

    <!-- <script src="{{ asset('js/vendor-all.min.js') }}"></script> -->

    <!-- <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script> -->

    <!-- <script src="{{ asset('js/ripple.js') }}"></script> -->

    <!-- <script src="{{ asset('js/pcoded.min.js') }}"></script> -->

    <!--<script src="../assets/js/menu-setting.min.js"></script>-->

    <!-- <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script> -->

    <!-- <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script> -->

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

{{-- autocomplete

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}

    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

 <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>



    @yield('page-script')



    <!-- flatpickr -->

    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>



    <script>



        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');



        $(document).ready(function () {

            $('.loader-bg').hide();

        });



        function buscar_especialidad() {

            let profesion_profesional = $('#profesion_profesional').val();

            let url = "{{ route('paciente.buscar_especialidad') }}";





            $.ajax({

                url: url,

                type: "POST",

                data: {

                    profesion_profesional: profesion_profesional,

                    _token: CSRF_TOKEN,

                },

                success: function(data) {

                    data = JSON.parse(data);



                    let especialidades = $('#especialidad');



                    especialidades.find('option').remove();

                    especialidades.append('<option value="0">Seleccione</option>');

                    $(data).each(function(i, v) { // indice, valor



                        especialidades.append('<option value="' + v.id + '">' + v.nombre +

                            '</option>');

                    })

                    // $('#especialidad_profesional').html(data);

                }

            });

        };



        function buscar_subespecialidad() {

            let especialidad = $('#especialidad').val();

            let url = "{{ route('paciente.buscar_sub_especialidad') }}";





            $.ajax({

                url: url,

                type: "POST",

                data: {

                    especialidad: especialidad,

                    _token: CSRF_TOKEN,

                },

                success: function(data) {

                    data = JSON.parse(data);



                    let sub_especialidades = $('#sub_especialidad');



                    sub_especialidades.find('option').remove();

                    sub_especialidades.append('<option value="0">Seleccione</option>');

                    $(data).each(function(i, v) { // indice, valor



                        sub_especialidades.append('<option value="' + v.id + '">' + v.nombre +

                            '</option>');

                    })

                    // $('#especialidad_profesional').html(data);

                }

            });

        };



        function buscar_ciudades_hora() {

            let region = $('#region_paciente').val();

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



                        let ciudades = $('#ciudad_paciente');



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

        }

    </script>



</body>



</html>

