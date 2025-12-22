<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vet SDI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <!-- Styles -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}">

    <!-- select2 selectbonito css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/dropzone.css" type="text/css" /> -->

    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!--boton azul-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">

    @yield('page-styles')

    <style>
        .diagnostico_activo {
            background: #fff !important;
        }

        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            margin: 40px auto;
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
    @include('template.profesional.menu')
    @include('template.profesional.header')

    @yield('content')

    {{--  <footer>
        @include('template.include.footer')
    </footer>  --}}

    @include('template.include.nocomplatible')


    <!-- Scripts -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>


    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/validaRut.js') }}"></script>
    <script src="{{ asset('js/periodontograma.js') }}"></script>

    <!-- momnent -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--full calendar 5-->
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/main.js') }}'></script>
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/locales/es.js') }}'></script>

    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>

    {{-- autocomplete --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>

    <!-- rut -->
    <script src="{{ asset('js/rut.js') }}"></script>

    <!-- funciones generales -->
    <script src="{{ asset('js/funciones.js') }}"></script>

    <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>

    @include('template.templateAutorizacion')

    <!--PERFIL PROFESIONAL-->
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');

        };


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


        function agregar_alergia_paciente(id_paciente) {

            let alergia = $('#alergia_paciente').val();
            let id_alergia = $('#id_alergia_paciente').val();
            let comentario = $('#alergia_comentario_paciente').val();
            let paciente = id_paciente;
            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.agregar_alergia_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        alergia: alergia,
                        id_alergia: id_alergia,
                        comentario: comentario,
                        paciente: paciente
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Alergia agregada correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        $('#alergia_paciente').val('');
                        $('#id_alergia_paciente').val('');
                        $('#alergia_comentario_paciente').val('');

                        $('#table_alergias_paciente tbody').html('');
                        $('#table_alergias_paciente_ver tbody').html('');
                        for (i = 0; i < response.alergias.length; i++) {

                            var id_alergia = response.alergias[i].id;
                            var nombre_alergia = response.alergias[i].nombre_alergia;
                            var comentario_alergia = response.alergias[i].comentario;

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr class="tr_alergias_paciente" id="row' + id_alergia + '">';
                            fila += '    <td>' + nombre_alergia + '</td>';
                            fila += '    <td>' + comentario_alergia + '</td>';
                            fila += '    <td>' + '<div name="remove" id="' + id_alergia +
                                '" class="btn btn-danger btn_remove" onclick="eliminar_antecedente_alergia_paciente(\'' +
                                id_alergia + '\');">Quitar</div>' + '</td>';
                            fila += '</tr>';

                            var fila2 = '';
                            fila2 += '<tr class="tr_alergias_paciente" id="row' + id_alergia + '">';
                            fila2 += '    <td>' + nombre_alergia + '</td>';
                            fila2 += '    <td>' + comentario_alergia + '</td>';
                            fila2 += '</tr>';
                            j++;

                            $('#table_alergias_paciente tbody').append(fila);
                            $('#table_alergias_paciente_ver tbody').append(fila2);

                        }
                    } else {
                        swal({
                            title: "Error al agregar alergia",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }

                    return response;
                })
                .fail(function() {
                    console.log("error");
                });

        }

        function eliminar_antecedente_alergia_paciente(id_alergia_paciente) {

            var paciente = $('#id_paciente').val();
            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.eliminar_alergia_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        paciente: paciente,
                        id_alergia_paciente: id_alergia_paciente,
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Alergia eliminada correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        $('#table_alergias_paciente tbody').empty();
                        $('#table_alergias_paciente_ver tbody').empty();
                        for (i = 0; i < response.alergias.length; i++) {

                            var id_alergia = response.alergias[i].id;
                            var nombre_alergia = response.alergias[i].nombre_alergia;
                            var comentario_alergia = response.alergias[i].comentario;

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr class="tr_alergias_paciente" id="row' + id_alergia + '">';
                            fila += '    <td>' + nombre_alergia + '</td>';
                            fila += '    <td>' + comentario_alergia + '</td>';
                            fila += '    <td>' + '<div name="remove" id="' + id_alergia +
                                '" class="btn btn-danger btn_remove" onclick="eliminar_antecedente_alergia_paciente(\'' +
                                id_alergia + '\');">Quitar</div>' + '</td>';
                            fila += '</tr>';

                            var fila2 = '';
                            fila2 += '<tr class="tr_alergias_paciente" id="row' + id_alergia + '">';
                            fila2 += '    <td>' + nombre_alergia + '</td>';
                            fila2 += '    <td>' + comentario_alergia + '</td>';
                            fila2 += '</tr>';
                            j++;

                            $('#table_alergias_paciente tbody').append(fila);
                            $('#table_alergias_paciente_ver tbody').append(fila2);

                        }
                    } else {
                        swal({
                            title: "Error al eliminar alergia",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }

                    return response;
                })
                .fail(function() {
                    console.log("error");
                });
        }

        function editar_profesional_datos_personales(id) {

            let id_profesional = id;
            let rut = $('#editar_rut').val();
            let nombre = $('#editar_nombres').val();
            let apellido_uno = $('#editar_apellido_uno').val();
            let apellido_dos = $('#editar_apellido_dos').val();
            let sexo = $('#editar_sexo').val();
            let id_especialidad = $('#id_especialidad').val();
            let id_tipo_especialidad = $('#id_tipo_especialidad').val();
            let id_sub_tipo_especialidad = $('#id_sub_tipo_especialidad').val();
            let id_tipo_atencion = $('#id_tipo_atencion').val();
            let url = "{{ route('profesional.editar_datos_personales_perfil') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id_profesional: id_profesional,
                        rut: rut,
                        nombre: nombre,
                        apellido_uno: apellido_uno,
                        apellido_dos: apellido_dos,
                        sexo: sexo,
                        id_especialidad: id_especialidad,
                        id_tipo_especialidad: id_tipo_especialidad,
                        id_sub_tipo_especialidad: id_sub_tipo_especialidad,
                        id_tipo_atencion: id_tipo_atencion,

                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Datos del profesional editados correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);


                    } else {
                        swal({
                            title: "Error al Editar los datos del profesional",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);

                    }


                })
                .fail(function() {
                    console.log("error");
                })

        }

        function editar_datos_contacto_profesional() {

            let email = $('#editar_email').val();
            let telefono_uno = $('#editar_telefono_uno').val();
            let url = "{{ route('profesional.editar_datos_contacto_perfil') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        email: email,
                        telefono_uno: telefono_uno,

                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Datos del profesional editados correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 4000);


                    } else {
                        swal({
                            title: "Error al Editar los datos del profesional",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 4000);

                    }


                })
                .fail(function() {
                    console.log("error");
                })

        }

        function editar_datos_residencia_profesional() {

            let region = $('#perfil_region').val();
            let ciudad = $('#perfil_ciudad').val();
            let dire = $('#perfil_dire').val();
            let numero_dir = $('#perfil_numero_dir').val();
            let url = "{{ route('profesional.editar_datos_residencia_perfil') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        region: region,
                        ciudad: ciudad,
                        direccion: dire,
                        numero_dir: numero_dir,

                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Datos del profesional editados correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 4000);


                    } else {
                        swal({
                            title: "Error al Editar los datos del profesional",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 4000);

                    }


                })
                .fail(function() {
                    console.log("error");
                })
        }

        function agregar_antecedente_quirurgico_paciente(id_paciente) {

            let antecedente_quirurgico = $('#antecedente_quirurgico_paciente').val();
            let paciente = id_paciente;
            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.agregar_antecedente_quirurgico_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        antecedente_quirurgico: antecedente_quirurgico,
                        paciente: paciente
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Antecedente quirurgico agregado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        $('#antecedente_quirurgico_paciente').val('');

                        $('#table_antecedente_quirurgico_paciente tbody').empty();
                        for (i = 0; i < response.antecedentes_quirurgicos.length; i++) {

                            // var fecha = formatDate(data[i].created_at);
                            //var salida = formato(fecha);
                            var antecedente_quirurgico = response.antecedentes_quirurgicos[i].antecedente_quirurgico;
                            // var tipo = data[i].tipo_examen;
                            // var prioridad = data[i].id_prioridad;

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '<tr class="tr_antecedentes_quirurgicos_paciente" id="row' + j + '"><td>' +
                                antecedente_quirurgico + '</td><td>' +
                                'botones' +
                                '</td></tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#table_antecedente_quirurgico_paciente tbody').append(fila);

                        }


                        // $('#agregar_alergia_paciente').modal('hide');
                        // $('#alergia_paciente_' + paciente).append(response.alergia);
                    } else {
                        swal({
                            title: "Error al agregar alergia",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }


                })
                .fail(function() {
                    console.log("error");
                })

        }

        function agregar_patologia_cronica_paciente(id_paciente) {

            let patologia_cronica = $('#ant_nombre_patologia_cronica option:selected').text();
            let id_patologia_cronica = $('#id_ant_nombre_patologia_cronica').val();
            let paciente = id_paciente;
            let token = CSRF_TOKEN;

            if (id_patologia_cronica != 0) {
                let url = "{{ route('profesional.agregar_patologia_cronica_paciente') }}";
                $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_patologia_cronica: id_patologia_cronica,
                            patologia_cronica: patologia_cronica,
                            paciente: paciente
                        },
                    })
                    .done(function(response) {

                        if (response.success) {
                            swal({
                                title: "Patología Crónica agregada correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            $('#patologia_cronica').val('');

                            $('#table_patologia_cronica tbody').empty();
                            $('#table_patologia_cronica_ver tbody').empty();
                            for (i = 0; i < response.patologias_cronicas.length; i++) {
                                var nombre_patologia_cronica = response.patologias_cronicas[i].nombre_patologia_cronica;
                                var id_patologia_cronica_registro = response.patologias_cronicas[i].id;
                                var j = 1; //contador para asignar id al boton que borrara la fila
                                var fila = '';
                                fila += '<tr class="tr_patologia_cronica_paciente" id="row' + j + '">';
                                fila += '    <td>' + nombre_patologia_cronica + '</td>';
                                fila += '    <td>' + '<div name="remove" id="' + id_patologia_cronica_registro +
                                    '" class="btn btn-danger btn_remove" onclick="eliminar_patologia_cronica_paciente(\'' +
                                    id_paciente + '\',\'' + id_patologia_cronica_registro + '\');">Quitar</div>' +
                                    '</td>';
                                fila += '</tr>';

                                var fila2 = '';
                                fila2 += '<tr class="tr_patologia_cronica_paciente" id="row' + j + '_ver">';
                                fila2 += '    <td>' + nombre_patologia_cronica + '</td>';
                                fila2 += '</tr>';

                                j++;

                                $('#table_patologia_cronica tbody').append(fila);
                                $('#table_patologia_cronica_ver tbody').append(fila2);

                                $('#ant_nombre_patologia_cronica').val('');
                                $('#id_ant_nombre_patologia_cronica').val('');

                            }


                            // $('#agregar_alergia_paciente').modal('hide');
                            // $('#alergia_paciente_' + paciente).append(response.alergia);
                        } else {
                            swal({
                                title: "Error al agregar patología",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }


                    })
                    .fail(function() {
                        console.log("error");
                    })
            } else {
                swal({
                    title: "Error al agregar patología",
                    text: "Debe seleccionar una Patología.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
            }
        }

        function eliminar_patologia_cronica_paciente(id_paciente, id) {

            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.eliminar_patologia_cronica_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id,
                        paciente: id_paciente,
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Patologia eliminada correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        $('#table_patologia_cronica tbody').empty();
                        $('#table_patologia_cronica_ver tbody').empty();
                        for (i = 0; i < response.cronicas.length; i++) {

                            var id_cronicas = response.cronicas[i].id;
                            var nombre_patologia = response.cronicas[i].nombre_patologia_cronica;


                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr class="tr_patologia_cronica_paciente" id="row' + j + '">';
                            fila += '    <td>' + nombre_patologia + '</td>';
                            fila += '    <td>' + '<div name="remove" id="' + id_cronicas +
                                '" class="btn btn-danger btn_remove" onclick="eliminar_patologia_cronica_paciente(\'' +
                                id_paciente + '\',\'' + id_cronicas + '\');">Quitar</div>' + '</td>';
                            fila += '</tr>';

                            var fila2 = '';
                            fila2 += '<tr class="tr_patologia_cronica_paciente" id="row' + j + '_ver">';
                            fila2 += '    <td>' + nombre_patologia + '</td>';
                            fila2 += '</tr>';
                            j++;

                            $('#table_patologia_cronica tbody').append(fila);
                            $('#table_patologia_cronica_ver tbody').append(fila2);

                        }
                    } else {
                        swal({
                            title: "Error al eliminar Patología Crónica",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }

                    return response;
                })
                .fail(function() {
                    console.log("error");
                });
        }

        function agregar_medicamento_cronico_paciente(id_paciente) {

            var antecedentes_medicamento_cronico_paciente = $('#antecedentes_medicamento_cronico_paciente').val();
            var id_antecedentes_medicamento_cronico_paciente = $('#id_antecedentes_medicamento_cronico_paciente').val();
            var antecedentes_dosis_medicamento_cronico_paciente = $('#antecedentes_dosis_medicamento_cronico_paciente')
                .val();
            var nombre_antecedentes_dosis_medicamento_cronico_paciente = $(
                '#antecedentes_dosis_medicamento_cronico_paciente option:selected').text();
            let paciente = id_paciente;
            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.agregar_medicamento_cronico_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id_medicamento_cronico: id_antecedentes_medicamento_cronico_paciente,
                        medicamento_cronico: antecedentes_medicamento_cronico_paciente,
                        id_dosis: antecedentes_dosis_medicamento_cronico_paciente,
                        dosis: nombre_antecedentes_dosis_medicamento_cronico_paciente,
                        paciente: paciente
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Medicamento Crónico agregado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        $('#antecedentes_medicamento_cronico_paciente').val('');
                        $('#id_antecedentes_medicamento_cronico_paciente').val('');
                        $('#antecedentes_dosis_medicamento_cronico_paciente').val('');

                        $('#table_medicamento_cronico tbody').empty();
                        $('#table_medicamento_cronico_ver tbody').empty();
                        for (i = 0; i < response.medicamentos_cronicos.length; i++) {

                            var id_medicamento = response.medicamentos_cronicos[i].id;
                            var medicamento_cronico = response.medicamentos_cronicos[i].nombre_medicamento_cronico;
                            var dosis = response.medicamentos_cronicos[i].dosis;

                            var j = 1; //contador para asignar id al boton que borrara la fila

                            var fila = '';
                            fila += '<tr class="tr_medicamento_cronico_paciente" id="row' + j + '">';
                            fila += '   <td>' + medicamento_cronico + '</td>';
                            fila += '   <td>' + dosis + '</td>';
                            fila += '   <td>' + '<div name="remove" id="' + id_medicamento +
                                '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_cronico_paciente(\'' +
                                id_paciente + '\',\'' + id_medicamento + '\');">Quitar</div>' + '</td>';
                            fila += '</tr>';

                            var fila2 = '';
                            fila2 += '<tr class="tr_medicamento_cronico_paciente" id="row' + j + '">';
                            fila2 += '   <td>' + medicamento_cronico + '</td>';
                            fila2 += '   <td>' + dosis + '</td>';
                            fila2 += '</tr>';

                            j++;

                            $('#table_medicamento_cronico tbody').append(fila);
                            $('#table_medicamento_cronico_ver tbody').append(fila2);

                        }
                    } else {
                        swal({
                            title: "Error al agregar el medicamento crónico",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }


                })
                .fail(function() {
                    console.log("error");
                })

        }

        function eliminar_medicamento_cronico_paciente(id_paciente, id) {
            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.eliminar_medicamento_cronico_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id,
                        paciente: id_paciente,
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Medicamento eliminado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        $('#table_medicamento_cronico tbody').empty();
                        $('#table_medicamento_cronico_ver tbody').empty();
                        for (i = 0; i < response.medicamento.length; i++) {

                            var id_med_cronico = response.medicamento[i].id;
                            var nombre_medicamento = response.medicamento[i].nombre_medicamento_cronico;
                            var dosis = response.medicamento[i].dosis;


                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr class="tr_medicamento_cronica_paciente" id="row' + j + '">';
                            fila += '    <td>' + nombre_medicamento + '</td>';
                            fila += '    <td>' + dosis + '</td>';
                            fila += '    <td>' + '<div name="remove" id="' + id_med_cronico +
                                '" class="btn btn-danger btn_remove" onclick="eliminar_medicamento_cronico_paciente(\'' +
                                id_paciente + '\',\'' + id_med_cronico + '\');">Quitar</div>' + '</td>';
                            fila += '</tr>';

                            var fila2 = '';
                            fila2 += '<tr class="tr_medicamento_cronica_paciente" id="row' + j + '_ver">';
                            fila2 += '    <td>' + nombre_medicamento + '</td>';
                            fila2 += '    <td>' + dosis + '</td>';
                            fila2 += '</tr>';
                            j++;

                            $('#table_medicamento_cronico tbody').append(fila);
                            $('#table_medicamento_cronico_ver tbody').append(fila2);

                        }
                    } else {
                        swal({
                            title: "Error al eliminar Medicamento",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }

                    return response;
                })
                .fail(function() {
                    console.log("error");
                });
        }

        function agregar_cirugias_paciente(id_paciente) {

            var ant_cirugia_fecha_hora_operacion = $('#ant_cirugias_fecha_hora_operacion').val();
            var ant_cirugia_operacion = $('#ant_cirugias_operacion').val();
            var ant_cirugia_comentarios = $('#ant_cirugias_comentarios').val();

            let paciente = id_paciente;
            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.agregar_cirugias_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        nombre: ant_cirugia_operacion,
                        fecha_cirugia: ant_cirugia_fecha_hora_operacion,
                        comentarios: ant_cirugia_comentarios,
                        paciente: paciente
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Cirugia agregada correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        $('#ant_cirugias_fecha_hora_operacion').val('');
                        $('#ant_cirugias_operacion').val('');
                        $('#ant_cirugias_comentarios').val('');

                        $('#table_antecedente_cirugia tbody').empty();
                        $('#table_antecedente_cirugia_ver tbody').empty();
                        for (i = 0; i < response.cirugias.length; i++) {

                            var id_ant_cirugia = response.cirugias[i].id;
                            var nombre = response.cirugias[i].nombre;
                            var fecha = response.cirugias[i].fecha_cirugia;
                            var comentario = response.cirugias[i].comentarios;

                            var j = 1; //contador para asignar id al boton que borrara la fila

                            var fila = '';
                            fila += '<tr class="tr_cirugias_paciente" id="row' + j + '">';
                            fila += '   <td>' + fecha + '</td>';
                            fila += '   <td>' + nombre + '</td>';
                            fila += '   <td>' + comentario + '</td>';
                            fila += '   <td>' + '<div name="remove" id="' + id_ant_cirugia +
                                '" class="btn btn-danger btn_remove" onclick="eliminar_cirugias_paciente(\'' +
                                id_paciente + '\',\'' + id_ant_cirugia + '\');">Quitar</div>' + '</td>';
                            fila += '</tr>';

                            var fila2 = '';
                            fila2 += '<tr class="tr_cirugias_paciente" id="row' + j + '_ver">';
                            fila2 += '   <td>' + fecha + '</td>';
                            fila2 += '   <td>' + nombre + '</td>';
                            fila2 += '   <td>' + comentario + '</td>';
                            fila2 += '</tr>';

                            j++;

                            $('#table_antecedente_cirugia tbody').append(fila);
                            $('#table_antecedente_cirugia_ver tbody').append(fila2);

                        }
                    } else {
                        swal({
                            title: "Error al agregar la cirugia",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }


                })
                .fail(function() {
                    console.log("error");
                })

        }

        function eliminar_cirugias_paciente(id_paciente, id) {
            let token = CSRF_TOKEN;

            let url = "{{ route('profesional.eliminar_cirugias_paciente') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id,
                        paciente: id_paciente,
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Cirugia eliminada correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        $('#table_antecedente_cirugia tbody').empty();
                        $('#table_antecedente_cirugia_ver tbody').empty();
                        for (i = 0; i < response.cirugias.length; i++) {

                            var id_ant_cirugia = response.cirugias[i].id;
                            var nombre = response.cirugias[i].nombre;
                            var fecha = response.cirugias[i].fecha_cirugia;
                            var comentario = response.cirugias[i].comentarios;

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr class="tr_cirugias_paciente" id="row' + j + '">';
                            fila += '   <td>' + fecha + '</td>';
                            fila += '   <td>' + nombre + '</td>';
                            fila += '   <td>' + comentario + '</td>';
                            fila += '   <td>' + '<div name="remove" id="' + id_ant_cirugia +
                                '" class="btn btn-danger btn_remove" onclick="eliminar_cirugias_paciente(\'' +
                                id_paciente + '\',\'' + id_ant_cirugia + '\');">Quitar</div>' + '</td>';
                            fila += '</tr>';

                            var fila2 = '';
                            fila2 += '<tr class="tr_cirugias_paciente" id="row' + j + '_ver">';
                            fila2 += '   <td>' + fecha + '</td>';
                            fila2 += '   <td>' + nombre + '</td>';
                            fila2 += '   <td>' + comentario + '</td>';
                            fila2 += '</tr>';
                            j++;

                            $('#table_antecedente_cirugia tbody').append(fila);
                            $('#table_antecedente_cirugia_ver tbody').append(fila2);

                        }
                    } else {
                        swal({
                            title: "Error al eliminar Medicamento",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }

                    return response;
                })
                .fail(function() {
                    console.log("error");
                });
        }

        function modal_agregar_contacto_emergencia() {

            $('#agregar_contacto_emergencia').modal('show');
        }

        function cerrar_agregar_contacto_emergencia() {
            $('#agregar_contacto_emergencia').modal('hide');
            $('#form_contacto_nuevo').hide();
            //  $(this).find('form').trigger('reset');
        }

        function autorizacion_ficha_medica_unica(id) {

            swal({
                    title: "¿Desea solicitar el codigo de autorización?",
                    text: "Favor confirme o cancele la solicitud",
                    icon: "warning",
                    buttons: ["Cancelar", "Solicitar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {


                        let id_paciente = id;
                        let url = "{{ route('profesional.solicitar_codigo_fmu') }}";

                        $.ajax({
                                url: url,
                                type: "get",
                                data: {
                                    id_paciente: id_paciente,
                                }

                            })
                            .done(function(data) {

                                if (data == 'success') {

                                    swal({
                                        title: "Solicitud enviada",
                                        text: "Solicite el código de autorización al paciente",
                                        icon: "success",
                                        buttons: "Aceptar",
                                        SuccessMode: true,
                                    });

                                    $('#modal_autorizacion_ficha_medica_unica').modal('show');
                                    $('#id_paciente_fmu').val(id_paciente);

                                } else {

                                }

                            })
                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                console.log(jqXHR, ajaxOptions, thrownError)
                            });



                    } else {
                        swal({
                            title: "Solicitud Cancelada",
                            icon: "success",
                            buttons: "Aceptar",
                            dangerMode: true,
                        });
                    }
                });


        }

        function seleccionar_lugar_atencion() {

            //let email = $('#email_paciente_agregar').val();
            let url = "{{ route('profesional.lugares_atencion_profesional_agenda') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {}
                })
                .done(function(data) {

                    if (data == 'fail') {
                        console.log('fail');
                        swal("Advertencia",
                            "Bienvenido!!\n Debe ingresar en la pestaña Panel de Configuración, Mis Lugares de Atención y registrar por lo menos un lugar de atención.",
                            "warning");
                        //  alert('No tiene lugares de atención asignados, favor registrar uno');
                    } else {

                        let lugares_atencion = $('#lugares_atencion');

                        data = JSON.parse(data);
                        console.log(data);
                        lugares_atencion.find('option').remove();
                        lugares_atencion.append('<option value="0">Seleccione</option>');
                        let contador = 0;
                        console.log(data.length);
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].pivot.estado == '1') {
                                lugares_atencion.append('<option value="' + data[i].id + '">' + data[i].nombre +
                                    '</option>');
                                contador++;
                            }
                        }

                        if (contador == 0) {
                            swal("Oops", "No tiene lugares de atención asignados, favor registrar uno", "error")
                            //  alert('No tiene lugares de atención asignados, favor registrar uno');
                        } else {
                            if (contador == 1) {
                                lugares_atencion.val(data[0].id);
                                window.location.href = "{{ route('profesional.mi_agenda') }}?lugares_atencion=" + data[
                                    0].id;
                            } else {
                                $('#modal_seleccionar_lugar_atencion').modal('show');
                                validar_seleccionar_lugar_atencion();
                            }
                        }
                    }
                    // $(data).each(function(i, v) { // indice, valor

                    //     lugares_atencion.append('<option value="' + v.id + '">' + v.nombre +
                    //         '</option>');
                    // })

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function validar_seleccionar_lugar_atencion() {
            var valor = $('#lugares_atencion').val();
            if (valor == "" || valor == 0)
                $('#btn_modal_seleccionar_lugar_atencion_ir').attr('disabled', true);
            else
                $('#btn_modal_seleccionar_lugar_atencion_ir').attr('disabled', false);
        }

        function seleccionar_lugar_atencion_agenda() {

            //let email = $('#email_paciente_agregar').val();
            let url = "{{ route('profesional.lugares_atencion_profesional_agenda') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {

                    }
                })
                .done(function(data) {

                    if (data == 'fail') {
                        console.log('fail');

                        swal("Advertencia",
                            "Bienvenido!!\n Debe ingresar en la pestaña Panel de Configuración, Mis Lugares de Atención y registrar por lo menos un lugar de atención.",
                            "warning");
                        //  alert('No tiene lugares de atención asignados, favor registrar uno');

                    } else {
                        let lugares_atencion_agenda = $('#lugares_atencion_agenda');
                        data = JSON.parse(data);

                        lugares_atencion_agenda.find('option').remove();
                        lugares_atencion_agenda.append('<option value="0">Seleccione Lugar</option>');
                        let contador = 0;
                        for (let i = 0; i < data.length; i++) {

                            if (data[i].pivot.estado == '1') {
                                lugares_atencion_agenda.append('<option value="' + data[i].id + '">' + data[i].nombre +
                                    '</option>');
                                contador++;
                            }
                        }

                        if (contador == 0) {
                            swal("Oops", "No tiene lugares de atención asignados, favor registrar uno", "error")
                            //  alert('No tiene lugares de atención asignados, favor registrar uno');
                        } else {
                            {{--  $('#modal_seleccionar_lugar_atencion').modal('show');  --}}
                        }
                    }
                    // $(data).each(function(i, v) { // indice, valor

                    //     lugares_atencion.append('<option value="' + v.id + '">' + v.nombre +
                    //         '</option>');
                    // })

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        // function ingresar_mi_agenda() {
        //     $('#lugares_atencion option:selected').val();

        // }

        function cerrar_modal() {

            $('#modal_seleccionar_lugar_atencion').modal('hide');
        }

        function validar_email() {

            if ($("#email_paciente_agregar").val().indexOf('@', 0) == -1 || $("#email_paciente_agregar")
                .val().indexOf(
                    '.', 0) == -1) {

                swal({
                    title: "El correo electrónico introducido no es correcto.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('El correo electrónico introducido no es correcto.');
                return false;
            }

            let email = $('#email_paciente_agregar').val();
            let url = "{{ route('profesional.validar_rut') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {

                        email: email,

                    }

                })
                .done(function(data) {
                    if (data == 'fail') {

                        console.log(data);

                        $('#mensaje_email').text('el email ya esta en nuestros registros');
                        $('#mensaje_email').show();
                        $('#email_paciente_agregar').focus();

                        $("#registar_paciente_boton").prop('disabled', true);

                    } else {
                        $('#mensaje_email').text('');
                        $('#mensaje_email').hide();
                        $("#registar_paciente_boton").prop('disabled', false);
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_datos_contacto(id) {
            let id_contacto = id;
            url = "{{ route('profesional.cargar_datos_contacto') }}";
            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_contacto: id_contacto,

                    }

                })
                .done(function(data) {

                    if (data != null) {

                        $('#ver_rut_contacto').text(data.rut);
                        $('#ver_nombre_contacto').text(data.nombre + ' ' + data.apellido_uno + ' ' + data
                            .apellido_dos);
                        $('#ver_telefono_contacto').text(data.telefono);
                        console.log(data.ciudad);
                        $('#ver_direccion_contacto').text(data.direccion.direccion + ' ' +
                            data.direccion.numero_dir + ' Región de ' + data.region.nombre + ', ' + data.ciudad
                            .nombre);
                        //$('#info_contacto_emergencia').modal('show');
                        $('#ver_email_contacto').text(data.email);

                        $('#id_contacto').val(data.id);
                        $('#rut_contacto').val(data.rut);
                        $('#label_rut_contacto').addClass('floating-label-activo');

                        $('#nombres_contacto').val(data.nombre);
                        $('#label_nombres_contacto').addClass('floating-label-activo');


                        $('#apellido_uno_contacto').val(data.apellido_uno);
                        $('#label_apellido_uno_contacto').addClass('floating-label-activo');

                        $('#apellido_dos_contacto').val(data.apellido_dos);
                        $('#label_apellido_dos_contacto').addClass('floating-label-activo');

                        $('#telefono_contacto').val(data.telefono);
                        $('#label_telefono_contacto').addClass('floating-label-activo');

                        $('#direccion_contacto').val(data.direccion.direccion);
                        $('#label_direccion_contacto').addClass('floating-label-activo');

                        $('#numero_dir_contacto').val(data.direccion.numero_dir);
                        $('#label_numero_dir_contacto').addClass('floating-label-activo');


                        $('#region_contacto_modificar').val(data.region.id);
                        buscar_ciudades(data.ciudad.id);
                        $("#ciudad_contacto_modificar[value=" + data.region.id + "]").attr("selected", true);
                        //$('#ciudad_contacto_modificar').text(data.ciudad.nombre);


                        //$('#info_contacto_emergencia').modal('show');
                        $('#email_contacto').val(data.email);
                        $('#label_email_contacto').addClass('floating-label-activo');

                        $('#parentezco_contacto').val(data.parentezco);
                        $('#label_parentesco_contacto').addClass('floating-label-activo');

                        $('#prioridad_contacto').val(data.prioridad);
                        $('#label_prioridad_contacto').addClass('floating-label-activo');



                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function guardar_valores_lugar_atencion() {


            let id_lugar_atencion_valor = $('#id_lugar_atencion_valor').val();
            let convenios = '';
            for (let i = 1; i < 13; i++) {

                if ($('#convenio_' + i).prop('checked')) {

                    convenios = convenios + $('#text_convenio_' + i).text() + ',';
                }

            }

            console.log(convenios);

            let valor = $('#valor_convenio').val();
            let lugar_atencion_convenio = $('#lugar_atencion_convenio').val();
            let url = "{{ route('profesional.guardar_valores_lugar_atencion') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_lugar_atencion_valor: id_lugar_atencion_valor,
                        convenios: convenios,
                        valor: valor,
                        lugar_atencion_convenio: lugar_atencion_convenio
                    }

                })
                .done(function(data) {
                    if (data != 'error') {

                        location.reload();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function editar_contacto_emergencia() {

            let id_contacto = $('#id_contacto').val();

            let rut = $('#rut_contacto').val();
            let nombres = $('#nombres_contacto').val();
            let apellido_uno = $('#apellido_uno_contacto').val();
            let apellido_dos = $('#apellido_dos_contacto').val();
            let email = $('#email_contacto').val();
            let direccion = $('#direccion_contacto').val();
            let numero_dir = $('#numero_dir_contacto').val();

            let telefono = $('#telefono_contacto').val();
            let id_ciudad = $("#ciudad_contacto_modificar").val();
            let prioridad = $("#prioridad_contacto").val();
            let parentezco = $("#parentezco_contacto").val();
            let url = "{{ route('profesional.editar_contacto') }}";

            var valido = 1;
            var mensaje = ''
            if (rut == '') {
                valido = 0;
                mensaje += 'Debe ingresar rut.\n';
            }
            if (nombres == '') {
                valido = 0;
                mensaje += 'Debe ingresar nombres.\n';
            }
            if (apellido_uno == '') {
                valido = 0;
                mensaje += 'Debe ingresar apellido paterno.\n';
            }
            if (apellido_dos == '') {
                valido = 0;
                mensaje += 'Debe ingresar apellido materno.\n';
            }
            {{--  if(fecha == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar fecha.\n';
            }  --}}
            if (direccion == '') {
                valido = 0;
                mensaje += 'Debe ingresar direccion.\n';
            }
            if (id_ciudad == '' || id_ciudad == '0') {
                valido = 0;
                mensaje += 'Debe ingresar ciudad.\n';
            }
            if (email == '') {
                valido = 0;
                mensaje += 'Debe ingresar email.\n';
            }
            if (telefono == '') {
                valido = 0;
                mensaje += 'Debe ingresar telefono.\n';
            }
            if (parentezco == '' || parentezco == '0') {
                valido = 0;
                mensaje += 'Debe ingresar parentezco.\n';
            }
            if (prioridad == '' || prioridad == '0') {
                valido = 0;
                mensaje += 'Debe ingresar prioridad.\n';
            }
            {{--
            if(numero_dir == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar numero direccion.\n';
            }
            --}}

            if (valido == 1) {
                $.ajax({
                        url: url,
                        type: "get",
                        data: {
                            id_contacto: id_contacto,
                            rut: rut,
                            nombres: nombres,
                            apellido_uno: apellido_uno,
                            apellido_dos: apellido_dos,
                            email: email,
                            direccion: direccion,
                            numero_dir: numero_dir,
                            telefono: telefono,
                            id_ciudad: id_ciudad,
                            prioridad: prioridad,
                            parentezco: parentezco
                        }

                    })
                    .done(function(data) {
                        if (data != null) {

                            swal({
                                title: "Contacto editado de forma exitosa",
                                icon: "success",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);

                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Registro Contacto de Emergencia.",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        };

        function eliminar_contacto_paciente(contacto, paciente) {


            let id_contacto = contacto;
            let id_paciente = paciente

            let url = "{{ route('profesional.eliminar_contacto_paciente') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_contacto: id_contacto,
                        id_paciente: id_paciente
                    }

                })
                .done(function(data) {
                    if (data != 'error') {
                        swal({
                            title: "Contacto eliminado de forma exitosa",
                            icon: "success",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);


                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function enviar_email(id) {
            let id_paciente = id;
            let titulo_email = $('#titulo_email').val();
            let mensaje_email = $('#mensaje_email').val();
            let url = "{{ route('profesional.enviar_email') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        titulo_email: titulo_email,
                        mensaje_email: mensaje_email,
                        id_paciente: id_paciente
                    },
                })
                .done(function(data) {


                    if (data == 'ok') {

                        swal({
                            title: "Correo enviado de forma exitosa",
                            icon: "success",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 4000);
                        // alert('Correo enviado de forma exitosa');
                        // location.reload();

                    } else {

                        swal({
                            title: "Error al enviar el correo",
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

        function imprimir_certificado_reposo() {
            let url = "{{ route('print') }}";
            let dato = 'ok';

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut_asistente: rut_asistente,
                        dato: dato,
                    },
                })
                .done(function(data) {

                    return data;

                    /* if (data !== 'null') {


                         if (data == 'existe') {

                             alert('Asistente ya esta agregado a su lista');
                             $('#rut_nuevo_asistente').val('');

                         } else {
                             data = JSON.parse(data);
                             //console.log(data)
                             alert('Asistente encontrado en el sistema, valide datos para registrar');
                             $('#id_asistente_registrado').val(data.id);
                             $('#buscar_datos_asistente').hide();
                             $('#inputs_asistentes_dos').show();
                             $('#inputs_nuevo_asistente').show();
                             $('#nombre_nuevo_asistente').val(data.nombres);

                             $('#apellido_nuevo_asistente').val(data.apellido_uno);
                             $('#apellido_dos_nuevo_asistente').val(data.apellido_dos);
                             $('#email_nuevo_asistente').val(data.email);
                             $('#telefono_nuevo_asistente').val(data.telefono_uno);
                             $('#direccion_nuevo_asistente').val(data.direccion);
                             $('#numero_nuevo_asistente').val(data.numero_dir);
                             $('#region_agregar').val(data.region);

                             buscar_ciudad();

                             $('#ciudad_agregar').val(data.ciudad);
                             console.log(data.ciudad);


                         }

                     } else {

                         alert('Asistente no encontrada en el sistema, complete registro');
                         $('#inputs_asistentes_dos').show();
                         $('#inputs_nuevo_asistente').show();

                     }*/

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function buscar_contacto() {

            let rut_contacto = $('#rut_nuevo_contacto').val();
            let id_paciente_contacto = $('#id_paciente').val();
            let url = "{{ route('profesional.buscar_contacto') }}"

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut_contacto: rut_contacto,
                        id_paciente_contacto: id_paciente_contacto,
                    },
                })
                .done(function(data) {
                    if (data !== 'vacio') {
                        if (data == 'existe') {
                            swal({
                                title: "Ya Existe el contacto emergencia en su lista",
                                icon: "error",
                                buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                            // alert('Contacto Emergencia ya esta agregado a su lista');
                            $('#rut_nuevo_contacto').val('');

                        } else {
                            data = JSON.parse(data);
                            for (let i = 0; i < data.region.length; i++) {
                                if (data.region[i].id == data.ciudad.id_region) {
                                    $('#region_agregar').val(data.region[i].id);
                                    buscar_ciudad(data.ciudad.id);
                                }
                            }
                            //console.log(data)
                            /* alert('Asistente encontrado en el sistema, valide datos para registrar');
                             $('#id_asistente_registrado').val(data.id);
                             $('#buscar_datos_asistente').hide();

                             $('#inputs_nuevo_asistente').show();*/
                            $('#form_contacto_nuevo').show();
                            $('#nombres_contacto_emergencia').val(data.nombres);
                            $('#apellido_uno_contacto_emergencia').val(data.apellido_uno);
                            $('#apellido_dos_contacto_emergencia').val(data.apellido_dos);
                            $('#email_contacto_emergencia').val(data.email);
                            $('#telefono_contacto_emergencia').val(data.telefono_uno);
                            $('#direccion_contacto_emergencia').val(data.direccion);
                            $('#numero_dir_contacto_emergencia').val(data.numero_dir);
                            $('#fecha_nac_contacto_emergencia').val(data.fecha_nac);

                            let ciudad = data.ciudad.id;
                            {{--  $("#ciudad_agregar option[value=" + ciudad + "]").attr("selected", true);  --}}
                            $('#ciudad_agregar').val(ciudad);
                            // console.log(ciudad + ' entro a ciudad');



                            // console.log(data.ciudad.id);
                        }

                    } else {


                        swal({
                            title: "Rut no encontrado en el sistema, complete registro",
                            icon: "warning",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })

                        // alert('Rut no encontrado en el sistema, complete registro');
                        $('#form_contacto_nuevo').show();

                    }


                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });



        }

        function buscar_asistente_profesional() {

            let rut_asistente = $('#rut_nuevo_asistente').val();
            let url = "{{ route('profesional.buscar_asistente_profesional') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut_asistente: rut_asistente,
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {


                        if (data == 'existe') {

                            swal({
                                title: "Asistente ya esta agregado a su lista",
                                icon: "info",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            // alert('Asistente ya esta agregado a su lista');
                            $('#rut_nuevo_asistente').val('');

                        } else {
                            data = JSON.parse(data);
                            //console.log(data)
                            swal({
                                title: "Asistente encontrado en el sistema, valide datos para registrar",
                                icon: "info",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            // alert('Asistente encontrado en el sistema, valide datos para registrar');
                            $('#id_asistente_registrado').val(data.id);
                            $('#buscar_datos_asistente').hide();
                            $('#inputs_asistentes_dos').show();
                            $('#inputs_nuevo_asistente').show();
                            $('#nombre_nuevo_asistente').val(data.nombres);

                            $('#apellido_nuevo_asistente').val(data.apellido_uno);
                            $('#apellido_dos_nuevo_asistente').val(data.apellido_dos);
                            $('#email_nuevo_asistente').val(data.email);
                            $('#telefono_nuevo_asistente').val(data.telefono_uno);
                            $('#direccion_nuevo_asistente').val(data.direccion);
                            $('#numero_nuevo_asistente').val(data.numero_dir);
                            $('#region_agregar').val(data.region);

                            buscar_ciudad();

                            $('#ciudad_agregar').val(data.ciudad);
                            // console.log(data.ciudad);


                        }

                    } else {

                        swal({
                            title: "Asistente no encontrada en el sistema, complete registro",
                            icon: "info",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        })
                        // alert('Asistente no encontrada en el sistema, complete registro');
                        $('#inputs_asistentes_dos').show();
                        $('#inputs_nuevo_asistente').show();

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function ver_lugar_atencion(id) {

            let lugar_atencion = id;
            let url = '{{ route('profesional.ver_lugar_atencion') }}';

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        lugar_atencion: lugar_atencion,
                    },
                })
                .done(function(data) {

                    if (data != null) {

                        data = JSON.parse(data);

                        //$('#reserva_datos_paciente').show();
                        $('#id_lugar_atencion_modificar').val(data.LugarAtencion.id);
                        $('#editar_nombre_lugar_atencion').val(data.LugarAtencion.nombre);
                        $('#editar_email_lugar_atencion').val(data.LugarAtencion.email);
                        $('#tipo_editar_lugar_atencion').val(data.LugarAtencion.tipo);
                        $('#editar_direccion_lugar_atencion').val(data.Direccion.direccion);
                        $('#editar_numero_lugar_atencion').val(data.Direccion.numero_dir);
                        $('#editar_telefono_lugar_atencion').val(data.LugarAtencion.telefono);

                        if (data.LugarAtencion.tipo == 1) {

                            $("#tipo_editar_lugar_atencion option[value='Centro Médico'").attr("selected",
                                true);

                        } else if (data.LugarAtencion.tipo == 2) {
                            $("#tipo_editar_lugar_atencion option[value='Consulta Particular'").attr(
                                "selected", true);
                        } else {
                            $("#tipo_editar_lugar_atencion option[value='Seleccione'").attr("selected",
                                true);
                        }

                        console.log(data);
                        var regiones = $("#region_lugar_atencion_modificar");
                        var ciudades = $("#ciudad_lugar_atencion_modificar");

                        $(data.Regiones).each(function(i, v) { // indice, valor

                            if (v.id == data.Direccion.Ciudad.id_region) {
                                regiones.append('<option value="' + v.id + '" selected>' +
                                    v.nombre +
                                    '</option>');
                            }

                            regiones.append('<option value="' + v.id + '" >' +
                                v.nombre +
                                '</option>');
                        })

                        $(data.Ciudades).each(function(i, v) {

                            if (v.id == data.Direccion.Ciudad.id) {
                                ciudades.append('<option value="' + v.id + '" selected>' +
                                    v.nombre +
                                    '</option>');
                            }

                            ciudades.append('<option value="' + v.id + '" >' +
                                v.nombre +
                                '</option>');

                        });

                    } else {

                        console.log('error');

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


        };

        function editar_lugar_atencion() {

            let id_lugar_atencion = $('#id_lugar_atencion_modificar').val();
            let nombre = $('#editar_nombre_lugar_atencion').val();
            let email = $('#editar_email_lugar_atencion').val();
            let direccion = $('#editar_direccion_lugar_atencion').val();
            let numero_dir = $('#editar_numero_lugar_atencion').val();
            let telefono = $('#editar_telefono_lugar_atencion').val();
            let id_ciudad = $("#ciudad_lugar_atencion_modificar").val();
            let tipo = $("#tipo_editar_lugar_atencion").val();
            let url = "{{ route('profesional.editar_lugar_atencion') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_lugar_atencion: id_lugar_atencion,
                        nombre: nombre,
                        email: email,
                        direccion: direccion,
                        numero_dir: numero_dir,
                        telefono: telefono,
                        id_ciudad: id_ciudad,
                        tipo: tipo,
                    }

                })
                .done(function(data) {
                    if (data != null && data != 'error') {

                        swal({
                            title: "Lugar de Atención Actualizado.",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);
                    } else {
                        swal({
                            title: "Problema al actulizar Lugar de Atención.",
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

        function buscar_examen_ficha(id) {

            let url = '{{ route('profesional.buscar_examenes') }}';
            $('#table_examenes tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        console.log(data);

                        $('#ape_ficha_id').text('Examenes de Ficha Clinica Nro: ' + id);
                        for (i = 0; i < data.length; i++) {

                            var fecha = formatDate(data[i].created_at);
                            //var salida = formato(fecha);
                            var examen = data[i].examen;
                            var tipo = data[i].tipo_examen;
                            var prioridad = data[i].id_prioridad;

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '<tr class="tr_examen" id="row' + j + '"><td>' +
                                fecha + '</td><td>' +
                                tipo +
                                '</td><td>' +
                                prioridad +
                                '</td><td>' +
                                examen +
                                '</td><td>'; //esto seria lo que contendria la fila

                            j++;

                            $('#table_examenes tbody').append(fila);

                        }

                    } else {
                        //var fila = '<span><h5>no existen registros</h5></span>'
                        //$('#tabla_receta tbody').append(fila);
                    }
                    $('#m_cons_ex').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        // function buscar_archivos(id_ficha_clinica) {

        //     url = "{{ route('ficha_atencion.ver_archivos') }}";
        //     id_ficha = id_ficha_clinica;
        //     $('#table_atenciones_previas_archivos tbody').html('');

        //     $.ajax({
        //             url: url,
        //             type: "get",
        //             data: {
        //                 id_ficha_atencion: id_ficha
        //             },
        //             dataType: "json",
        //         })
        //         .done(function(data) {
        //             if (data != null) {

        //                 $('#m_cons_archivosLabel').text('Documentos de esta consulta del Paciente: ' + data.paciente
        //                     .nombre);
        //                 if (data.estado == 1) {
        //                     $('#table_atenciones_previas_archivos tbody').html('');
        //                     var j = 1; //contador para asignar id al boton que borrara la fila
        //                     $.each(data.registros, function(index, value) {
        //                         var fecha = formatDate(value.fecha);
        //                         var tipo = value.tipo;
        //                         var id = value.id;
        //                         var id_ficha_archivo = value.id_ficha;
        //                         var url = value.url;

        //                         var metodo = '';
        //                         switch (tipo) {
        //                             case 'Certificado de Reposo':
        //                                 metodo = 'ver_pdf_certificado_reposo';
        //                                 break;
        //                             case 'Interconsulta':
        //                                 metodo = '';
        //                                 break;
        //                             case 'Informen Medico':
        //                                 metodo = 'ver_pdf_informe_medico';
        //                                 break;
        //                             case 'Uso Personal':
        //                                 metodo = 'ver_pdf_uso_personal';
        //                                 break;

        //                             default:
        //                                 metodo = '';
        //                                 break;
        //                         }

        //                         var fila = '';
        //                         fila += '<tr class="tr_examen" id="row' + j + '">';
        //                         fila += '    <td class="text-center align-middle">' + fecha + '</td>';
        //                         fila += '    <td class="text-center align-middle">' + tipo + '</td>';
        //                         if (metodo != '')
        //                             fila += '    <td class="text-center align-middle"><div onclick="' + metodo +
        //                             '(' + id_ficha_archivo +
        //                             '); $(\'#m_cons_archivos\').modal(\'hide\');" class="btn btn-success btn-sm has-ripple"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
        //                         else
        //                             fila +=
        //                             '    <td class="text-center align-middle"><div class="btn btn-success btn-sm has-ripple disabled"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
        //                         fila += '</tr>';

        //                         j++;

        //                         $('#table_atenciones_previas_archivos tbody').append(fila);

        //                     });
        //                 } else {
        //                     $('#table_atenciones_previas_archivos tbody').html('');
        //                     var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>';
        //                     $('#table_atenciones_previas_archivos tbody').append(fila);
        //                 }

        //             } else {
        //                 $('#table_atenciones_previas_archivos tbody').html('');
        //                 var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>'
        //                 $('#table_atenciones_previas_archivos tbody').append(fila);
        //             }
        //             $('#m_cons_archivos').modal('show');
        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });

        //     $('#table_atenciones_previas_archivos').dataTable().fnClearTable();
        //     $('#table_atenciones_previas_archivos').dataTable().fnDestroy();
        //     $('#table_atenciones_previas_archivos').DataTable({
        //         responsive: true,
        //         "bPaginate": false,
        //     });
        // }

        function validar_email_agenda() {

            if ($("#reserva_hora_correo").val() != '') {
                if ($("#reserva_hora_correo").val().indexOf('@', 0) == -1 || $("#reserva_hora_correo").val().indexOf('.',
                    0) == -1) {
                    // swal({
                    //     title: "El correo electrónico introducido no es correcto.",
                    //     icon: "error",
                    //     buttons: "Aceptar",
                    //     DangerMode: true,
                    // })
                    // alert('El correo electrónico introducido no es correcto.');
                    $('#mensaje_email_reserva').text('El correo electrónico introducido no es correcto.');
                    $('#mensaje_email_reserva').show();
                    // $('#reserva_hora_correo').focus();
                    //$("#guardar_reserva_paciente").prop('disabled', true);
                    return false;
                }
            } else {
                if (validarEdad($('#reserva_hora_fecha_nac').val())) {
                    console.log("La edad es válida.");
                    let fechaNacimiento = new Date($('#reserva_hora_fecha_nac').val());
                    let hoy = new Date();
                    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

                    // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
                    if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy
                            .getDate() < fechaNacimiento.getDate())) {
                        edad--;
                    }

                    if (edad > 17) {
                        //$('#mensaje_email_reserva').text('Debe Ingresar un email.');
                        //$('#mensaje_email_reserva').show();
                        //$("#guardar_reserva_paciente").prop('disabled', true);
                        $('#btn_reserva_hora_telefono_uno_validar').attr('disabled', false);
                    } else {
                        // $('#mensaje_email_reserva').text('');
                        // $('#mensaje_email_reserva').hide();
                    }
                } else {
                    console.log("La edad no es válida.");
                    $('#btn_reserva_hora_telefono_uno_validar').attr('disabled', true);
                    //$("#guardar_reserva_paciente").prop('disabled', true);
                }
                return false;
            }

            let email = $('#reserva_hora_correo').val();
            // let url = "{{ route('profesional.validar_rut') }}";
            let url = "{{ route('agenda.paciente.validar_email') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        email: email,
                    }
                })
                .done(function(data) {
                    if (data == 'fail') {

                        // console.log(data);

                        $('#mensaje_email_reserva').text('El email ya esta en nuestros registros');
                        $('#mensaje_email_reserva').show();
                        $('#reserva_hora_correo').focus();

                        $("#guardar_reserva_paciente").prop('disabled', true);

                    } else {

                        if (validarEdad($('#reserva_hora_fecha_nac').val())) {
                            console.log("La edad es válida.");
                            $('#mensaje_reserva_hora_fecha_nac').html('');
                            $('#mensaje_reserva_hora_fecha_nac').hide();

                            $('#mensaje_email_reserva').text('');
                            $('#mensaje_email_reserva').hide();
                            $("#guardar_reserva_paciente").prop('disabled', false);

                        } else {
                            console.log("La edad no es válida.");
                            $("#guardar_reserva_paciente").prop('disabled', true);
                            $('#mensaje_reserva_hora_fecha_nac').html('');
                            $('#mensaje_reserva_hora_fecha_nac').show();
                            $('#mensaje_reserva_hora_fecha_nac').html('La fecha cargada no es valida');

                            $('#mensaje_email_reserva').text('');
                            $('#mensaje_email_reserva').hide();
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function validar_email_agenda_representante() {

            if ($("#reserva_hora_representante_correo").val().indexOf('@', 0) == -1 || $(
                    "#reserva_hora_representante_correo")
                .val().indexOf(
                    '.', 0) == -1) {
                swal({
                    title: "El correo electrónico introducido no es correcto.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('El correo electrónico introducido no es correcto.');
                //$("#guardar_reserva_paciente").prop('disabled', true);
                return false;
            }

            let email = $('#reserva_hora_representante_correo').val();
            // let url = "{{ route('profesional.validar_rut') }}";
            let url = "{{ route('agenda.paciente.validar_email') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {

                        email: email,

                    }

                })
                .done(function(data) {
                    if (data == 'fail') {

                        // console.log(data);

                        $('#mensaje_email_reserva_representante').text('el email ya esta en nuestros registros');
                        $('#mensaje_email_reserva_representante').show();
                        $('#reserva_hora_representante_correo').focus();

                        $("#guardar_reserva_paciente").prop('disabled', true);

                    } else {
                        $('#mensaje_email_reserva_representante').text('');
                        $('#mensaje_email_reserva_representante').hide();
                        //$("#guardar_reserva_paciente").prop('disabled', false);
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function buscar_paciente() {
            console.log("buscar_paciente2");
            $('#form_reseva_de_horas').submit(function(e) {
                e.preventDefault();
            });

            $('#reserva_hora_nombres_paciente').val('');
            $('#reserva_hora_apellido_uno').val('');
            $('#reserva_hora_apellido_dos').val('');
            $('#reserva_hora_fecha_nac').val('');
            $('#reserva_hora_sexo').val('');
            $('#reserva_hora_convenio').val('');
            $('#reserva_hora_direccion').val('');
            $('#reserva_hora_numero_dir').val('');
            $('#ciudad_agregar').val('');
            $('#reserva_hora_correo').val('');
            $('#reserva_hora_telefono_uno').val('');
            $('#reserva_hora_confirmacion').val('');
            $('#reserva_representante_nuevo_exitente').val('');
            $('#reserva_representante_id').val('');
            $('#reserva_representante_id_usuario').val('');
            $('#reserva_hora_representante_rut').val('');
            $('#reserva_hora_representante_nombres_paciente').val('');
            $('#reserva_hora_representante_apellido_uno').val('');
            $('#reserva_hora_representante_apellido_dos').val('');
            $('#reserva_hora_representante_fecha_nac').val('');
            $('#reserva_hora_representante_sexo').val('');
            $('#reserva_hora_representante_convenio').val('');
            $('#reserva_hora_representante_direccion').val('');
            $('#reserva_hora_representante_numero_dir').val('');
            $('#reserva_hora_representante_region_agregar').val('');
            $('#reserva_hora_representante_ciudad_agregar').val('');
            $('#reserva_hora_representante_correo').val('');
            $('#reserva_hora_representante_telefono_uno').val('');
            $('#reserva_hora_representante_agregar_relacion').val('');
            $('#contenedor_tratamientos_presupuesto').empty();
            $('#bono_valor_consulta').val(0);
            evaluar_edad();
            $('.div_representante_nuevo').hide();
            $('.div_representante_existente').hide();


            validar_campo_telefono();
            validar_campo_telefono_representante();

            let rut = $('#rut_paciente_reserva').val();
            console.log('[buscar_paciente] rut:', rut);

            if (rut != '') {
                $('#reserva_agregar_paciente_hora').hide();
                $('#reserva_datos_paciente').hide();
                let url = "{{ route('profesional.buscar_rut_paciente') }}";
                console.log('[buscar_paciente] url:', url);

                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            rut: rut,
                            id_lugar_atencion: $('#id_lugar_atencion').val()
                        },
                    })
                    .done(function(data) {
                        console.log(data);
                        console.log(JSON.parse(data));
                        if (data !== 'null') {

                            $('#div_procedimiento').show();
                            let tipo_agenda = $('#id_tipo_agenda').val();

                            if(tipo_agenda == 4)
                            {
                                $('#examenes').removeClass('d-none');
                                $('#examenes').addClass('d-block');

                                //carga de datos del paciente
                            }else{
                                $('#examenes').removeClass('d-block');
                                $('#examenes').addClass('d-none');
                            }
                            data = JSON.parse(data);
                            console.log('[buscar_paciente] data parsed:', data);
                            if (data.tipo_paciente == 'SI') {

                                {{-- validacion para especialidad de pediatria --}}
                                @if (isset($profesional))
                                    @if ($profesional->id_tipo_especialidad == 11)
                                        if (data.edad > 18) {
                                            swal({
                                                title: "Reserva de hora",
                                                text: "El paciente es mayor de edad, el profesional es Pediatrico",
                                                icon: "warning",
                                                buttons: "Aceptar",
                                            });
                                        }
                                    @endif
                                @endif


                                $('.paciente_view').show();
                                $('.paciente_edit').hide();

                                {{--  console.log(data);  --}}
                                $('#reserva_datos_paciente').show();
                                $('#reserva_hora_id_paciente').val(data.id);
                                $('#reserva_rut_paciente').text(data.rut);

                                $('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data
                                    .apellido_dos);
                                $('#input_reserva_hora_nombre').val(data.nombres);
                                $('#input_reserva_hora_apellido_uno').val(data.apellido_uno);
                                $('#input_reserva_hora_apellido_dos').val(data.apellido_dos);

                                $('#reserva_fecha_ultima_consulta').html(data.fecha_ultima_atencion);

                                let bonos = data.bonos;
                                let suma_pagado = 0;

                                bonos.forEach(b => {
                                    suma_pagado += b.valor_atencion;
                                });
                                $('#estado_pago').empty();
                                var clase = 'bg-success';
                                if (suma_pagado < 16750) {
                                    clase = 'bg-danger';
                                    $('#estado_pago').append(`
                                    <div class="circle ${clase}"></div>
                                `);
                                } else {
                                    $('#estado_pago').append(`
                                    <div class="circle ${clase}"></div>
                                `);
                                }

                                $('#reserva_fecha_nacimiento').text(data.fecha_nac);
                                $('#input_reserva_fecha_nacimiento').val(DateFormatVista(data.fecha_nac));

                                if (data.sexo == 'M') {
                                    $('#reserva_sexo').text('Masculino');
                                } else {
                                    $('#reserva_sexo').text('Femenino');
                                }
                                $('#input_reserva_hora_sexo').val(data.sexo);

                                $('#reserva_hora_email').text(data.email);
                                $('#input_reserva_hora_email').val(data.email);

                                $('#reserva_hora_telefono').text(data.telefono_uno);
                                $('#input_reserva_hora_telefono').val(data.telefono_uno);

                                $('#reserva_convenio').text(data.prevision.nombre);
                                $('#input_reserva_convenio').val(data.prevision.id);

                                $('#reserva_direccion').text(data.direccion.direccion + ' ' + data.direccion
                                    .numero_dir + ', ' + data.direccion.ciudad.nombre);
                                $('#input_reserva_direccion_direccion').val(data.direccion.direccion);
                                $('#input_reserva_direccion_numero_dir').val(data.direccion.numero_dir);

                                $('#input_reserva_direccion_region').val(data.direccion.ciudad.id_region);
                                // $('#input_reserva_direccion_ciudad_agregar').val(data.direccion.ciudad.id);
                                buscar_ciudad_general('input_reserva_direccion_region',
                                    'input_reserva_direccion_ciudad', data.direccion.ciudad.id);

                                $('#rut_paciente_reserva').val('');
                                $('.div_rut_buscar').hide();

                                $('#reserva_hora_edad').val(data.edad);
                                console.log('[buscar_paciente] mascotas payload:', data.mascotas);
                                renderMascotasReserva(data.mascotas || []);

                                // $('#id_lugar_atencion').val($('#agenda_lugar_atencion_asistente').val());
                                $('#contenedor_tratamientos_presupuesto').show();
                                $('#presupuesto_numero').empty();
                                $('#presupuesto_numero').append('<option>Seleccione el presupuesto </option>');
                                console.log(data.presupuestos);
                                if (data.presupuestos?.length > 0) {
                                    data.presupuestos.forEach(p => {
                                        $('#presupuesto_numero').append(
                                            `<option value="${p.id}" data-total="${p.valor_total}">${p.id} - ${p.fecha}</option>`
                                            );
                                    });
                                } else {
                                    $('#presupuesto_numero').append(`<option value="0">Primera consulta</option>`);
                                }

                                if (data.edad < 18) {
                                    $('#acompanante_representante').prop("checked", true);
                                    $('#acompanante_acompanante').prop("checked", false);
                                    $('#autorizacion_atencion').prop("checked", false);

                                    $('#div_info_representante').html(data.nombre_responsable);

                                    $('#reserva_hora_id_acompanante').html('');
                                    $.each(data.acompanante, function(indexInArray, valueOfElement) {
                                        console.log(valueOfElement);
                                        var html = '';
                                        html = '<option value="' + valueOfElement.id_acompanante + '">' +
                                            valueOfElement.acompanante.nombre + ' ' + valueOfElement.acompanante
                                            .apellido_uno + ' - ' + valueOfElement.acompanante.rut +
                                            '</option>';
                                        $('#reserva_hora_id_acompanante').append(html);
                                    });
                                    $('#reserva_hora_id_acompanante').select2();

                                    $('#reserva_hora_id_responsable').val(data.id_responsable);

                                    $('#seccion_acompanante').show();
                                    $('#seccion_autorizacion').show();
                                } else {
                                    $('#acompanante_representante').prop("checked", false);
                                    $('#acompanante_acompanante').prop("checked", false);
                                    $('#autorizacion_atencion').prop("checked", false);
                                    $('#reserva_hora_id_acompanante').val('');


                                    $('#reserva_hora_id_responsable').val('');

                                    $('#seccion_acompanante').hide();
                                    $('#seccion_autorizacion').hide();
                                }

                            } else {
                                $('#reserva_datos_paciente').hide();
                                $('#reserva_agregar_paciente_hora').show();
                                renderMascotasReserva([]);

                                $('#reserva_hora_nombres_paciente').val(data.nombres);
                                $('#reserva_hora_apellido_uno').val(data.apellido_uno);
                                $('#reserva_hora_apellido_dos').val(data.apellido_dos);
                                $('#presupuesto_numero').empty();
                                $('#presupuesto_numero').append(`<option value="0">Primera consulta</option>`);
                                //$('#reserva_hora_fecha_nac').val((DateFormatVista(data.fecha_nac)));

                                if (data.sexo != null)
                                    $('#reserva_hora_sexo').val(data.sexo);
                                else
                                    $('#reserva_hora_sexo').val(0);


                                $('#reserva_hora_correo').val(data.email);
                                $('#region_agregar').val(data.direccion.ciudad.id_region);
                                buscar_ciudad(data.direccion.id_ciudad);
                                $('#reserva_hora_direccion').val(data.direccion.direccion);
                                $('#reserva_hora_numero_dir').val(data.direccion.numero_dir);

                                $('#reserva_hora_telefono_uno').val(data.telefono_uno);

                                {{--
                            $('#reserva_hora_profesion').val();
                            $('#reserva_hora_convenio').val();
                            $('#reserva_hora_descripcion').val();
                            --}}
                                validar_email_agenda();
                                validar_campo_telefono();
                            }

                        } else {
                            $('#reserva_datos_paciente').hide();
                            $('#reserva_agregar_paciente_hora').show();
                            renderMascotasReserva([]);

                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Buscar Paciente",
                    text: 'Debe ingresar RUT para buscar.',
                    icon: "error",
                });
            }
        };

        var mascotasReservaCache = {};

        function setMascotaDetalle(mascota) {
            $('#reserva_mascota_nombre').text(mascota ? (mascota.nombre || '') : '');
            $('#reserva_mascota_especie').text(mascota ? ((mascota.especieMascota && mascota.especieMascota.nombre) || mascota.especie || '') : '');
            $('#reserva_mascota_tamano').text(mascota ? ((mascota.tamanoMascota && mascota.tamanoMascota.nombre) || mascota.tamano || '') : '');
            $('#reserva_mascota_sexo').text(mascota ? (mascota.sexo || '') : '');
            $('#reserva_mascota_fecha_nacimiento').text(mascota ? (mascota.fecha_nacimiento || '') : '');
            $('#reserva_mascota_chip').text(mascota ? (mascota.chip || '') : '');
            $('#reserva_mascota_esterilizado').text(mascota ? (mascota.esterilizado ? 'Si' : 'No') : '');
        }

        function renderMascotasReserva(mascotas) {
            var $select = $('#reserva_hora_mascota_id');
            console.log('[renderMascotasReserva] select found:', $select.length);
            if (!$select.length) {
                return;
            }
            $select.empty();
            $select.append('<option value="">Seleccione mascota</option>');
            mascotasReservaCache = {};

            console.log('[renderMascotasReserva] mascotas:', mascotas);
            if (Array.isArray(mascotas)) {
                mascotas.forEach(function(mascota) {
                    var nombre = mascota.nombre || 'Mascota';
                    var especie = '';
                    if (mascota.especieMascota && mascota.especieMascota.nombre) {
                        especie = mascota.especieMascota.nombre;
                    } else if (mascota.especie) {
                        especie = mascota.especie;
                    }
                    var label = nombre;
                    mascotasReservaCache[mascota.id] = mascota;
                    $select.append('<option value="' + mascota.id + '">' + label + '</option>');
                });
            }
            $select.off('change.reservaMascota').on('change.reservaMascota', function() {
                var mascotaId = $(this).val();
                setMascotaDetalle(mascotaId ? mascotasReservaCache[mascotaId] : null);
            });
            setMascotaDetalle(null);
        }

        function desasociar_asistente(id_asistente) {

            let id = id_asistente;
            let url = "{{ route('profesional.desasociar_asistente') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id: id,
                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data == 'ok') {


                        swal({
                            title: "Asistente eliminado de forma correcta",
                            icon: "success",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 4000);
                        // alert('asistente eliminado de forma correcta');
                        // location.reload();


                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function buscar_asistente(id) {
            $('#button-addon2').submit(function(e) {
                e.preventDefault();
            });
            let rut = $('#rut_asistente').val();
            let id_lugar = id;

            let tipo = 'asistente';
            //let url = "{{ route('profesional.buscar_rut_paciente') }}";
            let url = "{{ route('profesional.buscar_asistente') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut: rut,
                        id_lugar: id_lugar,

                    },
                })
                .done(function(data) {
                    // console.log(data)

                    if (data !== 'null') {

                        if (data == 'existe') {


                            swal({
                                title: "Rut ya registrado",
                                icon: "warning",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            // setTimeout(function() {
                            //     location.reload()
                            // }, 4000);
                            // alert('rut ya registrado');

                            $('#mensaje_asistente').text('Ya esta registrado el rut como asistente');
                        } else {
                            swal({
                                title: "Rut valido",
                                icon: "success",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })

                            // alert('rut valido');
                            $('#mensaje_asistente').text('');

                            data = JSON.parse(data);
                            // console.log(data)
                            $('#datos_asistente').show();
                            $('#id_asistente_lugar_atencion').val(data.id);
                            $('#datos_rut_asistente').text(data.rut);
                            $('#datos_nombre_asistente').text(data.nombres + ' ' + data.apellido_uno + ' ' + data
                                .apellido_dos);
                            $('#datos_email_asistente').text(data.email);
                            $('#datos_telefono_asistente').text(data.telefono_uno);

                        }

                    } else {

                        swal({
                            title: "Asistente no registrado, favor registrar en mis asistentes",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        // alert('Asistente no registrado, favor registrar en mis asistentes');
                        $('#rut_asistente').val('');


                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function cerrar_modal_receta() {
            $('#m_cons_receta').modal('hide');
        }

        function cerrar_modal_examen() {
            $('#m_cons_examen').modal('hide');
        }

        function cerrar_modal_ver_ficha() {
            $('#m_consultaant').modal('hide');
        }

        // function buscar_receta(id_ficha_clinica) {

        //     {{--  url = '{{ route('buscar.recetas') }}';  --}}
        //     url = '{{ route('detalle_receta.ver_medicamentos') }}';
        //     id_ficha = id_ficha_clinica;
        //     $('#tabla_receta tbody').empty();

        //     $.ajax({
        //             url: url,
        //             type: "get",
        //             data: {
        //                 id_ficha: id_ficha
        //             },
        //             dataType: "json",
        //         })
        //         .done(function(data) {
        //             if (data != null) {

        //                 $('#id_ficha_receta').text('Receta de Paciente: ' + data.paciente.nombre_paciente);

        //                 if (data.estado == 1) {
        //                     $('#tabla_atenciones_previas_receta tbody').html('');
        //                     $.each(data.registros, function(index, value) {
        //                         var fecha = formatDate(value.created_at);
        //                         //var salida = formato(fecha);
        //                         var medicamento = value.producto;
        //                         var presentacion = value.presentacion;
        //                         var posologia = value.posologia;
        //                         var via_administracion = value.via_administracion;
        //                         var periodo = value.periodo;
        //                         var uso_cronico = value.uso_cronico;
        //                         var cantidad_compr = value.cantidad_compra;

        //                         if (uso_cronico == 1)
        //                             uso_cronico = 'USO CRONICO';
        //                         else
        //                             uso_cronico = 'NORMAL';

        //                         var j = 1; //contador para asignar id al boton que borrara la fila
        //                         var fila = '<tr class="tr_receta" id="row' + j + '">' +
        //                             '<td>' + fecha + '</td>' +
        //                             '<td>' + medicamento + '</td>' +
        //                             '<td>' + presentacion + '</td>' +
        //                             '<td>' + posologia + '</td>' +
        //                             '<td>' + via_administracion + '</td>' +
        //                             '<td>' + periodo + '</td>' +
        //                             '<td>' + uso_cronico + '</td>' +
        //                             '<td>' + cantidad_compr + '</td>' +
        //                             '</tr>';
        //                         //esto seria lo que contendria la fila

        //                         $('#tabla_atenciones_previas_receta tbody').append(fila);
        //                     });
        //                 } else {
        //                     $('#tabla_atenciones_previas_receta tbody').html('');
        //                     var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
        //                     $('#tabla_atenciones_previas_receta tbody').append(fila);
        //                 }

        //             } else {
        //                 $('#tabla_atenciones_previas_receta tbody').html('');
        //                 var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
        //                 $('#tabla_atenciones_previas_receta tbody').append(fila);
        //             }
        //             $('#m_cons_receta').modal('show');
        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });

        //     $('#tabla_atenciones_previas_receta').dataTable().fnClearTable();
        //     $('#tabla_atenciones_previas_receta').dataTable().fnDestroy();
        //     $('#tabla_atenciones_previas_receta').DataTable({
        //         responsive: true,
        //         "bPaginate": false,
        //     });

        // }

        function ver_ficha_atencion(id) {

            let id_ficha = id;
            let url = "{{ route('profesional.ver_ficha_atencion') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        _token: CSRF_TOKEN,
                        id_ficha: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data)

                    $('#num_consulta').text(data.id);
                    $('#ver_examen_fisico').text(data.examen_fisico);
                    $('#ver_diagnostico').text(data.hipotesis_diagnostico);
                    $('#ver_motivo').text(data.motivo);
                    $('#ver_antecedentes').text(data.antecedentes);
                    $('#m_consultaant').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function buscar_examenes(id_ficha_clinica) {

            {{-- url = "{{ route('buscar.examenes_ficha') }}"; --}}
            url = "{{ route('examenes.ver_examenes') }}";
            id_ficha = id_ficha_clinica;
            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha_atencion: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#id_ficha_examen').text('Exámenes de: ' + data.paciente.nombre_paciente);
                        if (data.estado == 1) {
                            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            $.each(data.registros, function(index, value) {
                                var fecha = formatDate(value.created_at);
                                //var salida = formato(fecha);
                                var examen = value.examen;
                                var tipo_examen = value.tipo_examen;
                                var prioridad = value.id_prioridad;

                                switch (prioridad) {
                                    case 1:
                                        prioridad = 'Baja';
                                        break;
                                    case 2:
                                        prioridad = 'Media';
                                        break;
                                    case 3:
                                        prioridad = 'Alta';
                                        break;
                                    case 4:
                                        prioridad = 'Urgente';
                                        break;

                                    default:
                                        prioridad = 'Sin Prioridad';
                                        break;
                                }

                                var fila = '';
                                fila += '<tr class="tr_examen" id="row' + j + '">';
                                fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                                fila += '    <td class="text-center align-middle">' + examen + '</td>';
                                fila += '    <td class="text-center align-middle">' + tipo_examen + '</td>';
                                fila += '    <td class="text-center align-middle">' + prioridad + '</td>';
                                fila += '</tr>'; //esto seria lo que contendria la fila

                                j++;

                                $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);

                            });
                        } else {
                            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                            var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                        }

                    } else {
                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                        var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
                        $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                    }
                    $('#m_cons_examen').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

            $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnClearTable();
            $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnDestroy();
            $('#table_atecion_previa_tabla_examen_paciente').DataTable({
                responsive: true,
                "bPaginate": false,
            });

        }

        function buscar_receta_ficha(id) {

            let url = '{{ route('profesional.buscar_recetas') }}';
            $('#atenciones_previas_2 tbody').empty();
            let id_ficha = id;

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        console.log(data);

                        $('#ap_ficha_id').text('Receta de Ficha Clinica Nro: ' + id);
                        for (i = 0; i < data.length; i++) {

                            var fecha = formatDate(data[i].created_at);
                            //var salida = formato(fecha);
                            var medicamento = data[i].producto;
                            var dosis = data[i].dosis;
                            var frecuencia = data[i].frecuencia;
                            var presentacion = data[i].presentacion;
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '<tr class="tr_receta" id="row' + j + '"><td>' +
                                fecha + '</td><td>' +
                                medicamento +
                                '</td><td>' +
                                dosis +
                                '</td><td>' +
                                frecuencia +
                                '</td><td>' +
                                presentacion + '</td></tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#atenciones_previas_2 tbody').append(fila);

                        }

                    } else {
                        //var fila = '<span><h5>no existen registros</h5></span>'
                        //$('#tabla_receta tbody').append(fila);
                    }
                    $('#m_cons_receta').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function buscar_hora_medica() {
            let buscar_horas = $('#buscar_horas').val();
            if (buscar_horas == '') {
                @if (isset($fecha_carga))
                    buscar_horas = '{{ $fecha_carga }}';
                    $('#buscar_horas').val('{{ $fecha_carga }}');
                @endif
            }

            let id_lugares_atencion = $('#lugares_atencion_agenda').val();
            let url = "{{ route('profesional.buscar_horas_medicas') }}";
            $('#simpletable tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        buscar_horas: buscar_horas,
                        id_lugares_atencion: id_lugares_atencion
                    },
                })
                .done(function(data) {
                    if (data != null) {

                        console.log(data);
                        data = JSON.parse(data);
                        for (i = 0; i < data.length; i++) {

                            var hora_inicio = data[i].hora_inicio;
                            // var salida = formato(fecha);
                            var fecha_consulta = data[i].fecha_consulta;
                            var paciente = data[i].id_paciente.nombres + ' ' + data[i].id_paciente.apellido_uno + ' ' +
                                data[i].id_paciente.apellido_dos;

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr>';
                            fila += '<td class="text-center align-left">' + hora_inicio + '</td>';
                            fila += '<td class="text-center align-left bg-estado-light-amarillo">';
                            fila += '	<strong>';
                            fila += "		<span>" + paciente + "</span>";
                            fila += '	<strong>';
                            //fila += '		<br style="line-height: 1%;"><span>'+data[i].id_paciente.rut+'</span>';
                            fila += '</td>';
                            fila += '<td class="text-center align-left">' + data[i].lugar_atencion.nombre + '</td>';
                            fila += '</tr>';
                            //var fila = '<tr class="tr_horas" id="row' + j + '"><td>' +
                            //    hora_inicio + '</td><td>' +
                            //    paciente +
                            // '</td><td class="text-center align-middle"><button href="' +
                            //'" class="btn btn-info btn-sm btn-icon" data-toggle="tooltip"' +
                            // ' data-placement="top" title="Atender Paciente">' +
                            // '<i class="feather icon-check"></i> </button>' +
                            //  '<button href="#!" class="btn btn-danger btn-sm btn-icon"' +
                            // 'data-toggle="tooltip" data-placement="top" title="Anular Hora">' +
                            //'<i class="feather icon-x"></i> </button>' +
                            // '</td></tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#simpletable tbody').append(fila);

                        }


                    } else {
                        //var fila = '<span><h5>no existen registros</h5></span>'
                        //$('#tabla_receta tbody').append(fila);
                    }
                    $('#m_cons_receta').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function agendar_hora() {


            let url = "{{ route('profesional.agendar_hora') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let reserva_hora_id = $('#reserva_hora_id_paciente').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let tipo_agenda = $('#id_tipo_agenda').val();
            let id_mascota = $('#reserva_hora_mascota_id').val();
            var tipo_agenda_text = 'C';
            var procedimiento = '';
            var proc_bloque = '';
            if ($('#form_reseva_de_horas_id_procedimiento').length == 1) {
                procedimiento = $('#form_reseva_de_horas_id_procedimiento').val();
                proc_bloque = $('#form_reseva_de_horas_id_procedimiento option:selected').attr('data-cant_bloque');
            } else {
                proc_bloque = parseInt($('#cantidad_bloques_atencion').text());
            }

            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C'; //CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D'; //DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T'; //TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E'; //EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);

            let representante = 0;
            let lista_Acompanante = $('#reserva_hora_id_acompanante').val();

            if ($('#acompanante_representante').prop("checked"))
                representante = 1;
            else
                representante = 0;

            let acompanante = 0;
            if ($('#acompanante_acompanante').prop("checked"))
                acompanante = 1;
            else {
                acompanante = 0;
                lista_Acompanante = '';
            }

            let autorizacion_atencion = 0;
            if ($('#autorizacion_atencion').prop("checked"))
                autorizacion_atencion = 1;
            else
                autorizacion_atencion = 0;

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        fecha_consulta: fecha_consulta,
                        reserva_hora_id: reserva_hora_id,
                        id_lugar_atencion: id_lugar_atencion,
                        tipo_hora_medica: tipo_agenda_text,
                        representante: representante,
                        acompanante: acompanante,
                        lista_Acompanante: lista_Acompanante,
                        autorizacion_atencion: autorizacion_atencion,
                        procedimiento: procedimiento,
                        proc_bloque: proc_bloque,
                        id_mascota: id_mascota,
                    }
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);

                        if (data.estado == 'error') {

                            swal({
                                title: "Error!",
                                text: data.msj,
                                type: "error",
                                icon: "error",
                                confirmButtonText: "Cool"
                            });
                            $('#agenda_agregar_paciente').modal('hide');
                        } else {
                            swal({
                                title: "Hora Agendada Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            // setTimeout(function() {
                            //     location.reload()
                            // }, 5000);
                            $('#agenda_agregar_paciente').modal('hide');
                            // location.reload();
                        }
                        // cargarAgendaProfesional( data.id_profesional,fecha_consulta );
                        @if (isset($lugar_atencion))
                            cargarAgendaProfesional($('#id_tipo_agenda').val(), '{{ $lugar_atencion }}', data
                                .id_profesional, fecha_consulta);
                        @endif

                    } else {

                        swal({
                            title: "Error!",
                            text: "Paciente no encontrado en el sistema",
                            type: "error",
                            confirmButtonText: "Cool"
                        });

                        // alert('Paciente no encontrado en el sistema');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });



        };

        function agendar_hora_paciente_nuevo() {


            let url = "{{ route('profesional.agendar_hora_nuevo_paciente') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let tipo_agenda = $('#id_tipo_agenda').val();
            var tipo_agenda_text = 'C';

            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C'; //CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D'; //DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T'; //TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E'; //EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);

            let rut_paciente_reserva = $('#rut_paciente_reserva').val();
            if (rut_paciente_reserva == '') {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el Rut",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return false;
            }

            let reserva_hora_nombre = $('#reserva_hora_nombres_paciente').val();
            if (reserva_hora_nombre == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar los nombres del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_primer_apellido = $('#reserva_hora_apellido_uno').val();
            if (reserva_hora_primer_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el primer apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_segundo_apellido = $('#reserva_hora_apellido_dos').val();
            if (reserva_hora_segundo_apellido == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el segundo apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;

            }
            let reserva_hora_fecha_nac = $('#reserva_hora_fecha_nac').val();
            if (reserva_hora_fecha_nac == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar la fecha de nacimiento",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;
            } else {
                reserva_hora_fecha_nac = formatDateDB(reserva_hora_fecha_nac);
            }

            let reserva_hora_sexo = $('#reserva_hora_sexo').val();
            if (reserva_hora_sexo == '0') {

                swal({
                    title: "Error!",
                    text: "Debe seleccionar el del sexo del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });

                return;
            }
            let reserva_hora_convenio = $('#reserva_hora_convenio').val();
            if (reserva_hora_convenio == '0') {

                swal({
                    title: "Error!",
                    text: "Debe seleccionar la previsión del paciente",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            let reserva_hora_direccion = $('#reserva_hora_direccion').val();
            if (reserva_hora_direccion == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar una dirección",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            let reserva_hora_numero_dir = $('#reserva_hora_numero_dir').val();
            {{--
            if (reserva_hora_numero_dir == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar un numero a su dirección",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            --}}
            let reserva_hora_comuna = $('#ciudad_agregar').val();
            if (reserva_hora_comuna == '' || reserva_hora_comuna == '0' || reserva_hora_comuna == 'null' ||
                reserva_hora_comuna == null) {

                swal({
                    title: "Error!",
                    text: "Debe ingresar la región y la ciudad",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_email = $('#reserva_hora_correo').val();
            let reserva_hora_telefono_uno = $('#reserva_hora_telefono_uno').val();
            let reserva_result_codigo_validacion = $('#result_codigo_validacion').val();

            let fechaNacimiento = new Date(reserva_hora_fecha_nac);
            let hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();

            // Comprobamos si el mes y el día de la fecha de nacimiento ya pasaron en el año actual
            if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy
                    .getDate() < fechaNacimiento.getDate())) {
                edad--;
            }

            // if( edad > 18 )
            if ($('#paciente_dependiente').prop('checked') == false) {
                if (reserva_hora_email == '') {

                    if (reserva_hora_telefono_uno == '' && (reserva_result_codigo_validacion == '' ||
                            reserva_result_codigo_validacion == '0')) {
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    } else {
                        if (reserva_result_codigo_validacion == '0') {
                            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                            if (caract.test(reserva_hora_email) == false) {
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el email o teléfono",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            }
                        }
                    }
                } else {

                    if (reserva_hora_telefono_uno == '') {
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    } else {
                        if (reserva_hora_email == '' && (reserva_result_codigo_validacion == '' ||
                                reserva_result_codigo_validacion == '0')) {
                            swal({
                                title: "Error!",
                                text: "Debe validar el teléfono",
                                icon: "error",
                                type: "danger",
                                DangerMode: true,
                            });
                            return;
                        }
                    }
                }
            }

            var reserva_representante_nuevo_exitente = $('#reserva_representante_nuevo_exitente').val();
            var reserva_representante_id = $('#reserva_representante_id').val();
            var reserva_representante_id_usuario = $('#reserva_representante_id_usuario').val();
            var reserva_hora_representante_rut = $('#reserva_hora_representante_rut').val();
            var reserva_hora_representante_nombres_paciente = $('#reserva_hora_representante_nombres_paciente').val();
            var reserva_hora_representante_apellido_uno = $('#reserva_hora_representante_apellido_uno').val();
            var reserva_hora_representante_apellido_dos = $('#reserva_hora_representante_apellido_dos').val();
            var reserva_hora_representante_fecha_nac = $('#reserva_hora_representante_fecha_nac').val();
            var reserva_hora_representante_sexo = $('#reserva_hora_representante_sexo').val();
            var reserva_hora_representante_convenio = $('#reserva_hora_representante_convenio').val();
            var reserva_hora_representante_direccion = $('#reserva_hora_representante_direccion').val();
            var reserva_hora_representante_numero_dir = $('#reserva_hora_representante_numero_dir').val();
            var reserva_hora_representante_region_agregar = $('#reserva_hora_representante_region_agregar').val();
            var reserva_hora_representante_ciudad_agregar = $('#reserva_hora_representante_ciudad_agregar').val();
            var reserva_hora_representante_correo = $('#reserva_hora_representante_correo').val();
            var reserva_hora_representante_telefono_uno = $('#reserva_hora_representante_telefono_uno').val();
            var reserva_hora_representante_result_codigo_validacion = $('#result_representante_codigo_validacion').val();
            var reserva_hora_representante_agregar_relacion = $('#reserva_hora_representante_agregar_relacion').val();


            var dependiente = 0;
            if ($('#paciente_dependiente').prop('checked') == true)
                dependiente = 1;
            else if ($('#paciente_dependiente').prop('checked') == false)
                dependiente = 0;

            if (edad < 18 || $('#paciente_dependiente').prop('checked') == true) {
                if (reserva_hora_representante_agregar_relacion == '') {
                    swal({
                        title: "Error!",
                        text: "Debe seleccionar Relación",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
                if (reserva_representante_nuevo_exitente == '1') {
                    /** existente */
                    if (reserva_representante_id == '') {
                        swal({
                            title: "Error!",
                            text: "Información del Representante con problemas",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    // if($('#reserva_representante_id_usuario').val() == '')
                    // {
                    //     swal({
                    //         title: "Error!",
                    //         text: "Información del Representante con problemas",
                    //         icon: "error",
                    //         type: "danger",
                    //         DangerMode: true,

                    //     });
                    //     return;
                    // }
                } else {
                    /** nuevo */
                    if (reserva_hora_representante_nombres_paciente == '') {
                        swal({
                            title: "Error!",
                            text: "Nombre del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if (reserva_hora_representante_apellido_uno == '') {
                        swal({
                            title: "Error!",
                            text: "Apellido Paterno del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if (reserva_hora_representante_apellido_dos == '') {
                        swal({
                            title: "Error!",
                            text: "Apellido Materno del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if (reserva_hora_representante_fecha_nac == '') {
                        swal({
                            title: "Error!",
                            text: "Fecha Nacimiento del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    } else {
                        reserva_hora_representante_fecha_nac = formatDateDB(reserva_hora_representante_fecha_nac);
                    }
                    if (reserva_hora_representante_sexo == '') {
                        swal({
                            title: "Error!",
                            text: "Sexo del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if (reserva_hora_representante_direccion == '') {
                        swal({
                            title: "Error!",
                            text: "Direccion del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    // if( reserva_hora_representante_numero_dir == '' )
                    // {
                    //     swal({
                    //         title: "Error!",
                    //         text: "Numero del Representante requerido",
                    //         icon: "error",
                    //         type: "danger",
                    //         DangerMode: true,

                    //     });
                    //     return;
                    // }
                    // if( reserva_hora_representante_region_agregar == '' )
                    // {
                    //     swal({
                    //         title: "Error!",
                    //         text: "Region del Representante requerido",
                    //         icon: "error",
                    //         type: "danger",
                    //         DangerMode: true,

                    //     });
                    //     return;
                    // }
                    if (reserva_hora_representante_ciudad_agregar == '' || reserva_hora_representante_ciudad_agregar ==
                        '0' || reserva_hora_representante_ciudad_agregar == 'null' ||
                        reserva_hora_representante_ciudad_agregar == null) {
                        swal({
                            title: "Error!",
                            text: "Ciudad del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }

                    if ($('#paciente_dependiente').prop('checked') == true) {
                        if (reserva_hora_representante_correo == '') {

                            if (reserva_hora_representante_telefono_uno == '' && (
                                    reserva_hora_representante_result_codigo_validacion == '' ||
                                    reserva_hora_representante_result_codigo_validacion == '0')) {
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el email o teléfono del representante",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            } else {
                                if (reserva_hora_representante_result_codigo_validacion == '0') {
                                    var caract = new RegExp(
                                    /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                                    if (caract.test(reserva_hora_representante_correo) == false) {
                                        swal({
                                            title: "Error!",
                                            text: "Debe ingresar el email o teléfono del representante",
                                            icon: "error",
                                            type: "danger",
                                            DangerMode: true,
                                        });
                                        return;
                                    }
                                }
                            }
                        } else {

                            if (reserva_hora_representante_telefono_uno == '') {
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el teléfono del representante",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            } else {
                                if (reserva_hora_representante_correo == '' && (
                                        reserva_hora_representante_result_codigo_validacion == '' ||
                                        reserva_hora_representante_result_codigo_validacion == '0')) {
                                    swal({
                                        title: "Error!",
                                        text: "Debe validar el teléfono del representante",
                                        icon: "error",
                                        type: "danger",
                                        DangerMode: true,
                                    });
                                    return;
                                }
                            }
                        }
                    }

                }
            }

            let reserva_hora_confirmacion = $('#reserva_hora_confirmacion').val();
            let reserva_hora_sms = $('#reserva_hora_sms').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        dependiente: dependiente,
                        fecha_consulta: fecha_consulta,
                        rut_paciente_reserva: rut_paciente_reserva,
                        reserva_hora_nombre: reserva_hora_nombre,
                        reserva_hora_primer_apellido: reserva_hora_primer_apellido,
                        reserva_hora_segundo_apellido: reserva_hora_segundo_apellido,
                        reserva_hora_fecha_nac: reserva_hora_fecha_nac,
                        reserva_hora_sexo: reserva_hora_sexo,
                        reserva_hora_convenio: reserva_hora_convenio,
                        reserva_hora_direccion: reserva_hora_direccion,
                        reserva_hora_numero_dir: reserva_hora_numero_dir,
                        reserva_hora_comuna: reserva_hora_comuna,
                        reserva_hora_email: reserva_hora_email,
                        reserva_hora_telefono: reserva_hora_telefono_uno,
                        reserva_result_codigo_validacion: reserva_result_codigo_validacion,
                        reserva_hora_confirmacion: reserva_hora_confirmacion,
                        reserva_hora_sms: reserva_hora_sms,
                        id_lugar_atencion: id_lugar_atencion,
                        tipo_hora_medica: tipo_agenda_text,
                        /** representante */
                        reserva_representante_nuevo_exitente: reserva_representante_nuevo_exitente,
                        reserva_representante_id: reserva_representante_id,
                        reserva_representante_id_usuario: reserva_representante_id_usuario,
                        reserva_hora_representante_rut: reserva_hora_representante_rut,
                        reserva_hora_representante_nombres_paciente: reserva_hora_representante_nombres_paciente,
                        reserva_hora_representante_apellido_uno: reserva_hora_representante_apellido_uno,
                        reserva_hora_representante_apellido_dos: reserva_hora_representante_apellido_dos,
                        reserva_hora_representante_fecha_nac: reserva_hora_representante_fecha_nac,
                        reserva_hora_representante_sexo: reserva_hora_representante_sexo,
                        reserva_hora_representante_convenio: reserva_hora_representante_convenio,
                        reserva_hora_representante_direccion: reserva_hora_representante_direccion,
                        reserva_hora_representante_numero_dir: reserva_hora_representante_numero_dir,
                        reserva_hora_representante_region_agregar: reserva_hora_representante_region_agregar,
                        reserva_hora_representante_ciudad_agregar: reserva_hora_representante_ciudad_agregar,
                        reserva_hora_representante_correo: reserva_hora_representante_correo,
                        reserva_hora_representante_telefono_uno: reserva_hora_representante_telefono_uno,
                        reserva_hora_representante_result_codigo_validacion: reserva_hora_representante_result_codigo_validacion,
                        reserva_hora_representante_agregar_relacion: reserva_hora_representante_agregar_relacion
                    },
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        // data = JSON.parse(data);
                        // console.log(data);
                        if (data.estado == 1) {
                            swal({
                                title: "Exito!",
                                text: "Hora medica agendada correctamente",
                                type: "success",
                                confirmButtonText: "Cool"
                            });

                            @if (isset($profesional) && isset($lugar_atencion))
                                // cargarAgendaProfesional('{{ $profesional->id }}',fecha_consulta);
                                cargarAgendaProfesional($('#id_tipo_agenda').val(), '{{ $lugar_atencion }}',
                                    '{{ $profesional->id }}', fecha_consulta);
                            @endif
                            $('#agenda_agregar_paciente').modal('hide');
                        } else {
                            swal({
                                title: "Hora medica",
                                text: data.msj,
                                type: "error",
                                confirmButtonText: "Cool"
                            });
                        }
                    } else {
                        swal({
                            title: "Error!",
                            text: "Paciente no encontrado en el sistema",
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                        // alert('Paciente no encontrado en el sistema');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function opcion_confirmar_hora() {


            $('#datos_hora_medica').hide();
            $('#cancelacion_hora_medica').hide();
            $('#cabecera_hora_medica').text('Confirmar Hora Medica');
            $('#hm_anular_hora').hide();
            $('#hm_atender_hora').hide();
            $('#hm_confirmar_hora').hide();
            $('#hm_ver_hora').hide();
            $('#confirmacion_hora').show();
            $('#confirmacion_hora_medica').show();


        };

        function opcion_cancelar_hora() {

            $('#datos_hora_medica').hide();
            $('#cancelacion_hora_medica').show();
            $('#cabecera_hora_medica').text('Cancelar Hora Medica');
            $('#hm_anular_hora').hide();
            $('#hm_atender_hora').hide();
            $('#hm_confirmar_hora').hide();
            $('#hm_ver_hora').hide();
            $('#confirmar_anulacion_hora').show();

        };

        function cancelar_hora() {

            let url = "{{ route('profesional.cancelar_hora') }}";
            let comentario = $('#cancelar_hora_comentario').val();
            let id_hora_medica = $('#id_hora_medica').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        comentario: comentario,
                        id_hora_medica: id_hora_medica
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        $('#consulta').modal('hide');
                        swal({
                            title: "Exito!",
                            text: "Hora medica cancelada correctamente",
                            type: "success",
                            confirmButtonText: "Cool"
                        });

                        // cargarAgendaProfesional($('#estado_id_profesional').val(),data.fecha_consulta);
                        @if (isset($lugar_atencion))
                            cargarAgendaProfesional($('#id_tipo_agenda').val(), '{{ $lugar_atencion }}',
                                '{{ $profesional->id }}', data.fecha_consulta);
                        @endif

                        // location.reload();

                    } else {
                        alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function paciente_esperando() {

            let url = "{{ route('profesional.eperando_hora') }}";
            let id_hora_medica = $('#id_hora_medica').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_hora_medica: id_hora_medica
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        swal({
                            title: "Exito!",
                            text: "Paciente esperando",
                            type: "success",
                            // DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        setTimeout(function() {
                            location.reload()
                        }, 1000);
                        // $('#consulta').modal('hide');
                        // location.reload();

                    } else {

                        swal({
                            title: "Error!",
                            text: "No se pudo Actualizar el estado de la Reserva",
                            type: "danger",
                            DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        // setTimeout(function() {
                        //     location.reload()
                        // }, 5000);
                        // alert('No se pudo Actualizar el estado de la Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function confirmar_hora() {

            let url = "{{ route('profesional.confirmar_hora') }}";
            let comentario = $('#confirmar_hora_comentario').val();
            let id_hora_medica = $('#id_hora_medica').val();
            let id_profesional = $('#estado_id_profesional').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        comentario: comentario,
                        id_hora_medica: id_hora_medica
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        swal({
                            title: "Exito!",
                            text: "Se ha confirmado su hora medica",
                            type: "success",
                            // DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        // cargarAgendaProfesional( id_profesional, data.fecha_consulta );
                        @if (isset($lugar_atencion))
                            cargarAgendaProfesional($('#id_tipo_agenda').val(), '{{ $lugar_atencion }}',
                                id_profesional, data.fecha_consulta);
                        @endif
                        // setTimeout(function() {
                        //     location.reload()
                        // }, 5000);
                        $('#consulta').modal('hide');
                        // location.reload();

                    } else {
                        swal({
                            title: "Error!",
                            text: "No se pudo Confirmar Reserva",
                            type: "danger",
                            DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        // setTimeout(function() {
                        //     location.reload()
                        // }, 5000);
                        alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function mi_horario_lugar_atencion(id) {
            let array_tipo_agenda = ['', 'Atención General', 'Atención Dental', 'Atención Telemedicina', 'Exámenes',
                'Procedimiento'
            ]
            let id_lugar_atencion = id;
            let url = "{{ route('profesional.mi_horario_lugar_atencion') }}";

            $('#mi_horario_table tbody').empty();
            $('#duracion_horario').val(0);
            $('#tipo_agenda_medica').val(0);
            $('#dia_horario').val('');
            $('#hora_inicio_horario').val(0);
            $('#hora_termino_horario').val(0);

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_lugar_atencion: id_lugar_atencion,
                    },
                })
                .done(function(data) {


                    if (data != null) {

                        data = JSON.parse(data);
                        // console.log(data);

                        $('#modal_editar_horario_atencion').modal('show');
                        $('#mi_horario_id_lugar_atencion').val(id);
                        for (i = 0; i < data.length; i++) {

                            let id = data[i].id;
                            let hora_inicio = data[i].hora_inicio;
                            let hora_termino = data[i].hora_termino;
                            let dia = '';
                            dias = data[i].dia.split(',');
                            for (let i = 0; i < dias.length; i++) {
                                if (dias[i] == 0) {
                                    dia += 'Domingo '
                                } else if (dias[i] == 1) {
                                    dia += 'Lunes '
                                } else if (dias[i] == 2) {
                                    dia += 'Martes '
                                } else if (dias[i] == 3) {
                                    dia += 'Miercoles '
                                } else if (dias[i] == 4) {
                                    dia += 'Jueves '
                                } else if (dias[i] == 5) {
                                    dia += 'Viernes '
                                } else if (dias[i] == 6) {
                                    dia += 'Sabado '
                                }
                            }

                            let j = 1; //contador para asignar id al boton que borrara la fila
                            let fila = '';
                            fila += '<tr class="tr_horario" id="row' + j + '">';
                            fila += '   <td class="text-center align-middle">';
                            fila += array_tipo_agenda[data[i].tipo_agenda]
                            fila += '   </td>';
                            fila += '   <td class="text-center align-middle">';
                            fila += hora_inicio
                            fila += '   </td>';
                            fila += '   <td class="text-center align-middle">';
                            fila += hora_termino;
                            fila += '   </td>';
                            fila += '   <td class="text-center align-middle">';
                            fila += dia;
                            fila += '   </td>';
                            fila += '   <td class="text-center align-middle">';
                            fila +=
                                '       <input class="btn btn-danger btn-sm btn-icon" title="Eliminar día" type="button" id="btn_eliminar_dia" name="btn_eliminar_dia" onclick="eliminar_dia_horario(' +
                                id + ',' + id_lugar_atencion + ' );" value="X" >';
                            fila += '   </td>';
                            fila += '</tr>';

                            j++;

                            $('#mi_horario_table tbody').append(fila);

                        }

                    } else {
                        alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function eliminar_dia_horario(id, id_lugar_atencion) {

            let id_horario = id;
            let lugar_atencion = id_lugar_atencion;
            let token = CSRF_TOKEN;
            let url = "{{ route('profesional.eliminar_horario_agenda') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id_horario: id_horario,
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Horario Eliminado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        $('#modal_editar_horario_atencion').modal('hide');
                        mi_horario_lugar_atencion(lugar_atencion);

                        // $('#table_alergias_paciente tbody').empty();
                        // for (i = 0; i < response.alergias.length; i++) {

                        //     // var fecha = formatDate(data[i].created_at);
                        //     //var salida = formato(fecha);
                        //     var nombre_alergia = response.alergias[i].nombre_alergia;
                        //     // var tipo = data[i].tipo_examen;
                        //     // var prioridad = data[i].id_prioridad;

                        //     var j = 1; //contador para asignar id al boton que borrara la fila
                        //     var fila = '<tr class="tr_alergias_paciente" id="row' + j + '"><td>' +
                        //         nombre_alergia + '</td><td>' +
                        //         'botones' +
                        //         '</td></tr>'; //esto seria lo que contendria la fila

                        //     j++;

                        //     $('#table_alergias_paciente tbody').append(fila);

                        // }


                        // $('#agregar_alergia_paciente').modal('hide');
                        // $('#alergia_paciente_' + paciente).append(response.alergia);
                    } else {
                        swal({
                            title: "Error al agregar alergia",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }

                    return response;

                    // $('#sub_tipo_examen').append(
                    //     `<option value="0">Seleccione... </option>`);
                    // for (var i = 0; i < response.length; i++) {
                    //     $('#sub_tipo_examen').append(`<option value="${response[i].id}">
                //                 ${response[i].nombre}
                //             </option>`);
                    // }
                })
                .fail(function() {
                    console.log("error");
                })


        }

        function mi_asistente_lugar_atencion(id) {


            let id_lugar_atencion = id;
            let url = "{{ route('profesional.mi_asistente_lugar_atencion') }}";
            $('#mi_asistente_table tbody').empty();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_lugar_atencion: id_lugar_atencion,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);

                        $('#editar_asistentes').modal('show');
                        $('#mi_asistente_id_lugar_atencion').val(id);
                        for (i = 0; i < data.length; i++) {
                            var checked = 'checked';
                            let nombres = data[i].nombres + ' ' + data[i].apellido_uno + ' ' + data[i].apellido_dos;
                            let rut = data[i].rut;
                            let id = data[i].id;
                            let j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';

                            fila += '<tr class="tr_asistente" id="row' + j + '">';
                            fila += '    <td>';
                            fila += '       <div class="form-group">';
                            fila += '           <div class="switch switch-success d-inline m-r-10">';
                            if (data[i].estado == 0) checked = '';
                            else checked = 'checked';
                            fila +=
                                '               <input type = "checkbox" id="estado_asistente" onclick="cambio_estado_asistente(' +
                                id + ');" ' + checked + '> ';
                            fila += '               <label for = "estado_asistente" class = "cr"> </label>';
                            fila += '           </div>';
                            fila += '      </div>';
                            fila += '   </td>';
                            fila += '   <td>' + rut + '</td>';
                            fila += '   <td>' + nombres + '</td>';
                            fila += '</tr>';
                            j++;

                            $('#mi_asistente_table tbody').append(fila);

                        }


                    } else {
                        alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function eliminar_valor_lugar_atencion(id) {

            let id_convenio = id;
            let url = "{{ route('profesional.eliminar_valor_lugar_atencion') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_convenio: id_convenio,
                    },
                })
                .done(function(data) {

                    if (data != 'failed') {
                        {{--  alert('convenio eliminado de forma correcta');  --}}
                        swal({
                            title: "Convenio eliminado de forma correcta",
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);
                        $('#modal_editar_valor_atencion').show();
                    } else {
                        alert('Error');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function cerrar_convenio() {
            $('#modal_editar_horario_atencion').modal('hide');
        }

        function mis_valores_lugar_atencion(id) {

            let id_lugar_atencion = id;
            let url = "{{ route('profesional.mis_valores_lugar_atencion') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_lugar_atencion: id_lugar_atencion,
                    },
                })
                .done(function(data) {

                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);
                        $('#id_lugar_atencion_valor').val(id_lugar_atencion);
                        for (i = 0; i < data.length; i++) {

                            let tipo_atencion = data[i].tipo_atencion;
                            let valor = data[i].valor;
                            let convenios = data[i].convenios;


                            let j = 1; //contador para asignar id al boton que borrara la fila
                            let fila = '<tr class="tr_valores" id="row' + j + '"><td>' +
                                tipo_atencion + '</td><td>' +
                                valor +
                                '</td><td>' +
                                convenios +
                                '</td><td>' +
                                '<button type="button" onclick="eliminar_valor_lugar_atencion(' + data[i].id +
                                ')" class="btn btn-danger btn-sm">Eliminar</button>' +
                                '</td></tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#tabla_valores tbody').append(fila);

                        }

                        $('#modal_editar_valor_atencion').modal('show');


                    } else {
                        alert('Error');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });



        };

        function editar_antecedentes_paciente(id) {

            let id_paciente = id;

            let edit_transfusion = $('input:radio[name=edit_transfusion]:checked').val();

            let edit_dona_sangre = $('input:radio[name=edit_dona_sangre]:checked').val();
            let editar_grupo_sanguineo = $('#editar_grupo_sanguineo').val();
            {{--  let comentarios_gruposangre = $('#comentarios_gruposangre').val();  --}}
            let edit_hepatitis = $('input:radio[name=edit_hepatitis]:checked').val();
            let comentarios_hepatitis = $('#comentarios_hepatitis').val();
            let edit_donante_total = $('input:radio[name=edit_donante_total]:checked').val();
            let edit_donante_parcial = $('input:radio[name=edit_donante_parcial]:checked').val();
            let comentarios_organo = $('#comentarios_organo').val();
            let comentarios_impedimento = $('#comentarios_impedimento').val();


            let url = "{{ route('profesional.editar_antecedentes_paciente') }}";


            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_paciente: id_paciente,
                        edit_transfusion: edit_transfusion,
                        edit_dona_sangre: edit_dona_sangre,
                        editar_grupo_sanguineo: editar_grupo_sanguineo,
                        {{--  comentarios_gruposangre: comentarios_gruposangre,  --}}
                        edit_hepatitis: edit_hepatitis,
                        comentarios_hepatitis: comentarios_hepatitis,
                        edit_donante_total: edit_donante_total,
                        edit_donante_parcial: edit_donante_parcial,
                        comentarios_organo: comentarios_organo,
                        comentarios_impedimento: comentarios_impedimento

                    },
                })
                .done(function(data) {




                    if (data != 'failed') {

                        swal({
                            title: "se modifico antecedentes del paciente",
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);
                        // alert('se modifico antecedentes del paciente');
                        // location.reload();

                    } else {
                        swal({
                            title: "Error al modificar los antecedentes",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('Error al modificar los antecedentes');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function mi_horario_agregar() {

            let id_lugar_atencion = $('#mi_horario_id_lugar_atencion').val();
            let url = "{{ route('profesional.mi_horario_lugar_atencion_agregar') }}";
            let duracion = $('#duracion_horario').val();
            if (duracion == 0) {
                swal({
                    title: "Error",
                    text: "Debe ingresar una duracion",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })

                return;
            }

            let tipo = $('#tipo_agenda_medica').val();
            if (tipo == 0) {
                swal({
                    title: "Error",
                    text: "Debe ingresar un tipo de agenda",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })

                return;
            }


            let dia = $('#dia_horario').val();
            if (dia == '') {
                swal({
                    title: "Error",
                    text: "Debe ingresar un dia",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('no selecciono dia de consulta');
                return;
            }
            let hora_inicio = $('#hora_inicio_horario').val();
            if (hora_inicio == 0) {
                swal({
                    title: "Error",
                    text: "Debe ingresar una hora de inicio",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('no selecciono hora de inicio de consulta');
                return;
            }
            let hora_termino = $('#hora_termino_horario').val();
            if (hora_termino == 0) {
                swal({
                    title: "Error",
                    text: "Debe ingresar una hora de termino",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('no selecciono hora de termino de consulta');
                return;
            }
            let tipo_agenda_medica = $('#tipo_agenda_medica').val();


            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_lugar_atencion: id_lugar_atencion,
                        duracion: duracion,
                        dia: dia,
                        hora_inicio: hora_inicio,
                        hora_termino: hora_termino,
                        tipo_agenda_medica: tipo_agenda_medica,
                    },
                })
                .done(function(data) {
                    console.log(data);
                    if (data == 'Failed') {
                        swal({
                            title: "Error",
                            text: "Error, horario ya se encuentra registrado",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('Horario Topa con otro')
                    }

                    if (data != null) {
                        data = JSON.parse(data);
                        console.log(data);

                        $('#modal_editar_horario_atencion').modal('hide');
                        mi_horario_lugar_atencion(id_lugar_atencion);

                    } else {
                        swal({
                            title: "Error",
                            text: "No se pudo Confirmar Reserva",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function cambio_estado_lugar_atencion(id) {
            let id_lugar_atencion = id;
            let url = "{{ route('profesional.cambio_estado_lugar_atencion') }}";

            if ($('#estado_lugar_atencion_' + id).prop('checked')) {
                swal({
                        title: "¿Esta seguro que desea habilitar el lugar de atención?",
                        text: "Favor confirme o cancele la solicitud",
                        icon: "warning",
                        buttons: ["Cancelar", "Solicitar"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {


                            let estado = 1;

                            $.ajax({

                                    url: url,
                                    type: "get",
                                    data: {
                                        //_token: _token,
                                        id_lugar_atencion: id_lugar_atencion,
                                        estado: estado
                                    },
                                })
                                .done(function(data) {
                                    if (data == 'ok') {
                                        $('#estado_lugar_atencion_' + id).prop('checked', true);
                                        swal({
                                            title: "Lugar de atencion habilitado",
                                            icon: "success",
                                            buttons: "Aceptar",
                                            //SuccessMode: true,
                                        })
                                        // alert('lugar de atención habilitado');

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "Error al habilitar el lugar de atencion",
                                            icon: "error",
                                            buttons: "Aceptar",
                                            DangerMode: true,
                                        })
                                        // alert('Error al Habilitar el lugar de atención');
                                        $('#estado_lugar_atencion_' + id).prop('checked', false);
                                    }

                                })
                                .fail(function(jqXHR, ajaxOptions, thrownError) {
                                    console.log(jqXHR, ajaxOptions, thrownError)
                                });



                        } else {
                            $('#estado_lugar_atencion_' + id).prop("checked", false);
                            swal({
                                title: "Solicitud Cancelada",
                                icon: "success",
                                buttons: "Aceptar",
                                dangerMode: true,
                            });
                        }
                    });
                // let confirmacion = confirm('Esta seguro que desea habilitar el lugar de atencion?');
                // if (confirmacion == true) {

                //     let estado = 1;

                //     $.ajax({

                //             url: url,
                //             type: "get",
                //             data: {
                //                 //_token: _token,
                //                 id_lugar_atencion: id_lugar_atencion,
                //                 estado: estado
                //             },
                //         })
                //         .done(function(data) {
                //             if (data == 'ok') {
                //                 $('#estado_lugar_atencion_' + id).prop('checked', true);
                //                 swal({
                //                     title: "Lugar de atencion habilitado",
                //                     icon: "success",
                //                     buttons: "Aceptar",
                //                     //SuccessMode: true,
                //                 })
                //                 // alert('lugar de atención habilitado');

                //             } else {
                //                 swal({
                //                     title: "Error",
                //                     text: "Error al habilitar el lugar de atencion",
                //                     icon: "error",
                //                     buttons: "Aceptar",
                //                     DangerMode: true,
                //                 })
                //                 // alert('Error al Habilitar el lugar de atención');
                //                 $('#estado_lugar_atencion_' + id).prop('checked', false);
                //             }

                //         })
                //         .fail(function(jqXHR, ajaxOptions, thrownError) {
                //             console.log(jqXHR, ajaxOptions, thrownError)
                //         });

                // } else {
                //     $('#estado_lugar_atencion_' + id).prop("checked", false);
                // }
            } else {

                swal({
                        title: "¿Esta seguro que desea deshabilitar el lugar de atención??",
                        text: "Favor confirme o cancele la solicitud",
                        icon: "warning",
                        buttons: ["Cancelar", "Deshabilitar"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            let estado = 0;

                            $.ajax({

                                    url: url,
                                    type: "get",
                                    data: {
                                        //_token: _token,
                                        id_lugar_atencion: id_lugar_atencion,
                                        estado: estado
                                    },
                                })
                                .done(function(data) {
                                    if (data == 'ok') {
                                        $('#estado_lugar_atencion_' + id).prop('checked', false)

                                    } else {
                                        swal({
                                            title: "Error",
                                            text: "Error al deshabilitar el lugar de atención",
                                            icon: "error",
                                            buttons: "Aceptar",
                                            DangerMode: true,
                                        })
                                        // alert('Error al Deshabilitar el lugar de atención');
                                        $('#estado_lugar_atencion_' + id).prop("checked", true);
                                    }

                                })
                                .fail(function(jqXHR, ajaxOptions, thrownError) {
                                    console.log(jqXHR, ajaxOptions, thrownError)
                                });


                        } else {
                            $('#estado_lugar_atencion_' + id).prop("checked", true);
                            swal({
                                title: "Solicitud Cancelada",
                                icon: "success",
                                buttons: "Aceptar",
                                dangerMode: true,
                            });
                        }
                    });

                // let confirmacion = confirm('Esta seguro que desea deshabilitar el lugar de atención?');

                // if (confirmacion == true) {

                //     let estado = 0;

                //     $.ajax({

                //             url: url,
                //             type: "get",
                //             data: {
                //                 //_token: _token,
                //                 id_lugar_atencion: id_lugar_atencion,
                //                 estado: estado
                //             },
                //         })
                //         .done(function(data) {
                //             if (data == 'ok') {
                //                 $('#estado_lugar_atencion_' + id).prop('checked', false)

                //             } else {
                //                 swal({
                //                     title: "Error",
                //                     text: "Error al deshabilitar el lugar de atención",
                //                     icon: "error",
                //                     buttons: "Aceptar",
                //                     DangerMode: true,
                //                 })
                //                 // alert('Error al Deshabilitar el lugar de atención');
                //                 $('#estado_lugar_atencion_' + id).prop("checked", true);
                //             }

                //         })
                //         .fail(function(jqXHR, ajaxOptions, thrownError) {
                //             console.log(jqXHR, ajaxOptions, thrownError)
                //         });

                // } else {
                //     $('#estado_lugar_atencion_' + id).prop("checked", true);
                // }
            }
        }

        function cambio_estado_asistente(id) {

            let id_asistente = id;
            let id_lugar_atencion = $('#mi_asistente_id_lugar_atencion').val();
            let url = "{{ route('profesional.cambio_estado_asistente') }}";

            if ($('#estado_asistente').prop('checked')) {
                let confirmacion = confirm('Esta seguro que desea habilitar al o la asistente?');
                if (confirmacion == true) {

                    let estado = 1;

                    $.ajax({

                            url: url,
                            type: "get",
                            data: {
                                //_token: _token,
                                id_asistente: id_asistente,
                                estado: estado,
                                id_lugar_atencion: id_lugar_atencion,
                            },
                        })
                        .done(function(data) {
                            if (data == 'ok') {
                                $('#estado_asistente').prop('checked', true);

                            } else {
                                swal({
                                    title: "Error al Habilitar al o la asistente",
                                    icon: "error",
                                    buttons: "Aceptar",
                                    DangerMode: true,
                                })
                                // setTimeout(function() {
                                //     location.reload()
                                // }, 4000);
                                // alert('Error al Habilitar al o la asistente');
                                $('#estado_asistente').prop('checked', false);
                            }

                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });

                } else {
                    $('#estado_asistente').prop("checked", false);
                }
            } else {
                let confirmacion = confirm('Esta seguro que desea deshabilitar al o la asistente?');
                if (confirmacion == true) {

                    let estado = 0;

                    $.ajax({

                            url: url,
                            type: "get",
                            data: {
                                //_token: _token,
                                id_asistente: id_asistente,
                                estado: estado,
                                id_lugar_atencion: id_lugar_atencion,
                            },
                        })
                        .done(function(data) {
                            if (data == 'ok') {
                                $('#estado_asistente').prop('checked', false)

                            } else {
                                alert('Error al Deshabilitar al o la asistente');
                                $('#estado_asistente').prop("checked", true);
                            }

                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });

                } else {
                    $('#estado_asistente').prop("checked", true);
                }
            }
        };

        function buscar_ciudades(id_ciudad = 0) {

            let region = $('#region_lugar_atencion_modificar').val();

            if (region == null) {
                region = $('#region_contacto_modificar').val();

            }

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

                        let ciudades = $('#ciudad_lugar_atencion_modificar');
                        let ciudades_contacto = $('#ciudad_contacto_modificar');

                        ciudades_contacto.find('option').remove();
                        ciudades_contacto.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor

                            ciudades_contacto.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if (id_ciudad != 0) {
                            ciudades.val(id_ciudad);
                            ciudades_contacto.val(id_ciudad);
                        }

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


        function buscar_ciudad(id_ciudad = 0) {

            let region = $('#region_agregar').val();
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

                        let ciudades = $('#ciudad_agregar');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">Seleccione</option>');
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

        function buscar_ciudad_perfil(id_ciudad = 0) {

            let region = $('#perfil_region').val();
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

                        let ciudades = $('#perfil_ciudad');

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

        function buscar_ciudad_repesentante(id_ciudad = 0) {

            let region = $('#reserva_hora_representante_region_agregar').val();
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

                        let ciudades = $('#reserva_hora_representante_ciudad_agregar');

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


        function registrar_contacto_emergencia() {

            let id_paciente = $('#id_paciente').val();
            let url = "{{ route('profesional.registrar_contacto_emergencia') }}";

            let rut = $('#rut_nuevo_contacto').val();
            let nombres = $('#nombres_contacto_emergencia').val();
            let apellido_uno = $('#apellido_uno_contacto_emergencia').val();
            let apellido_dos = $('#apellido_dos_contacto_emergencia').val();
            let fecha = $('#fecha_nac_contacto_emergencia').val();
            let direccion = $('#direccion_contacto_emergencia').val();
            let id_ciudad = $('#ciudad_agregar').val();
            let email = $('#email_contacto_emergencia').val();
            let telefono = $('#telefono_contacto_emergencia').val();
            let parentezco = $('#parentezco_contacto_emergencia').val();
            let prioridad = $('#prioridad_contacto_emergencia').val();

            // let direccion = $('#direccion_contacto_emergencia').val();
            let numero_dir = $('#numero_dir_contacto_emergencia').val();
            //let ciudad_agregar = $('#ciudad_agregar').val();

            var valido = 1;
            var mensaje = ''
            if (rut == '') {
                valido = 0;
                mensaje += 'Debe ingresar rut.\n';
            }
            if (nombres == '') {
                valido = 0;
                mensaje += 'Debe ingresar nombres.\n';
            }
            if (apellido_uno == '') {
                valido = 0;
                mensaje += 'Debe ingresar apellido paterno.\n';
            }
            if (apellido_dos == '') {
                valido = 0;
                mensaje += 'Debe ingresar apellido materno.\n';
            }
            if (fecha == '') {
                valido = 0;
                mensaje += 'Debe ingresar fecha.\n';
            }
            if (direccion == '') {
                valido = 0;
                mensaje += 'Debe ingresar direccion.\n';
            }
            if (id_ciudad == '' || id_ciudad == '0') {
                valido = 0;
                mensaje += 'Debe ingresar ciudad.\n';
            }
            if (email == '') {
                valido = 0;
                mensaje += 'Debe ingresar email.\n';
            }
            if (telefono == '') {
                valido = 0;
                mensaje += 'Debe ingresar telefono.\n';
            }
            if (parentezco == '' || parentezco == '0') {
                valido = 0;
                mensaje += 'Debe ingresar parentezco.\n';
            }
            if (prioridad == '' || prioridad == '0') {
                valido = 0;
                mensaje += 'Debe ingresar prioridad.\n';
            }
            {{--
            if(numero_dir == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar numero direccion.\n';
            }
            --}}

            if (valido == 1) {
                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            id_paciente: id_paciente,
                            rut: rut,
                            nombres: nombres,
                            apellido_uno: apellido_uno,
                            apellido_dos: apellido_dos,
                            fecha: fecha,
                            direccion: direccion,
                            numero_dir: numero_dir,
                            id_ciudad: id_ciudad,
                            email: email,
                            telefono: telefono,
                            parentezco: parentezco,
                            prioridad: prioridad

                        },
                    })
                    .done(function(data) {
                        if (data != null) {
                            data = JSON.parse(data);
                            // console.log(data);

                            $('#agregar_contacto_emergencia').modal('hide');

                            swal({
                                title: "Se Registro Contacto de emergencia de forma correcta",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                            // Swal.clickConfirm();
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                            // $('#mensaje_ditar_perfil').text(
                            //     'Se Registro Contacto de emergencia de forma correcta');


                        } else {
                            swal({
                                title: "No se pudo registrar al contacto de emergencia",
                                icon: "Danger",
                                buttons: "Aceptar",
                                dangerMode: true,
                            });

                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Registro Contacto de Emergencia.",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        };
    </script>


    <script>
        $(document).ready(function() {


            $('#tabla_examenes_profesional_ro').DataTable({
                responsive: true,
            });

            $('#table_aranceles_dental').DataTable({
                responsive: true,
            });

            $('#table_procedimientos_propios_dental').DataTable({
                responsive: true,
            });

            $('#historial_mensajes').DataTable({
                responsive: true,
            });

            $('#tabla_recetas_profesional_ro').DataTable({
                responsive: true,
            });



            $('#tabla_certificado_profesional_ro').DataTable({
                responsive: true,
            });


            {{--  mensaje de al registrar ficha clinica  --}}
            @if (session('mensaje'))
                swal({
                    @if (session('titulo_mensaje'))
                        title: "{{ session('titulo_mensaje') }}",
                    @else
                        title: "Registro de Ficha Clínica.",
                    @endif
                    text: "{{ session('mensaje') }}",
                    icon: "info",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif
            {{--  mensaje de exito al registrar ficha clinica  --}}
            @if (session('success'))
                swal({
                    @if (session('titulo_success'))
                        title: "{{ session('titulo_success') }}",
                    @else
                        title: "Registro de Ficha Clínica.",
                    @endif
                    text: "{{ session('success') }}",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

            {{--  mensaje de erro al registrar ficha clinica  --}}
            @if (session('error'))
                swal({
                    @if (session('titulo_error'))
                        title: "{{ session('titulo_error') }}",
                    @else
                        title: "Registro de Ficha Clínica.",
                    @endif
                    text: "{{ session('error') }}",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

            {{--  mensaje de warning al registrar ficha clinica  --}}
            @if (session('warning'))
                swal({
                    @if (session('titulo_warning'))
                        title: "{{ session('titulo_warning') }}",
                    @else
                        title: "Registro de Ficha Clínica.",
                    @endif
                    text: "{{ session('warning') }}",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

            /** autocompletado de alergias */
            $("#alergia_paciente").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('alergias.ver_autocomplete') }}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#alergia_paciente').val(ui.item.label); // display the selected text
                    $('#id_alergia_paciente').val(ui.item.value); // save selected id to input

                    return false;
                }
            });

            /** autocomplete de medicamentos antecedentes */
            $("#antecedentes_medicamento_cronico_paciente").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#antecedentes_medicamento_cronico_paciente').val(ui.item.label);
                    $('#id_antecedentes_medicamento_cronico_paciente').val(ui.item.value);
                    getDosis(ui.item.value, 'antecedentes_dosis_medicamento_cronico_paciente');


                    return false;
                }
            });

            $('#nombre_procedimiento').autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getDiagnosticoDental') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    console.log(ui.item);
                    $('#id_procedimiento').val(ui.item.value);
                    // Set selection
                    $('#nombre_procedimiento').val(ui.item.label); // display the selected text
                    return false;
                }
            });

            $('#nombre_procedimiento_impl').autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getTratamientoImplantologia') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    console.log(ui.item);
                    $('#id_procedimiento').val(ui.item.value);
                    // Set selection
                    $('#nombre_procedimiento_impl').val(ui.item.label); // display the selected text
                    return false;
                }
            });

            $('#recepcion_programa').click(function() {
                $('#sesiones_programa').toggle();
            });

            $("form").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });

            $('#tabla_configuracion_cie10').DataTable({
                "searching": false,
                responsive: true,
                "bPaginate": true,
            });

            $('#table_atenciones_profesional').DataTable({
                responsive: true,
                "bPaginate": false,
            });

            $('#tabla_atenciones_previas_receta').DataTable({
                responsive: true,
                "bPaginate": false,
            });


            $('#tabla_lugares_atencion').on('click', ".accion_editar_lugar_atencion", function() {
                console.log("abrir modal accion_editar_lugar_atencion");
                $('#editar_lugar_atencion').modal();
            });

            $('#tabla_lugares_atencion').on('click', ".desasociar_lugar_existente", function() {
                console.log("abrir modal desasociar_lugar_existente");
                $('#modal_desasociar_lugar_existente').modal();
            });

            $('#tabla_lugares_atencion').on('click', ".accion_asistentes", function() {
                console.log("abrir modal accion_asistentes");
                $('#editar_asistentes').modal();
            });

            $('#tabla_lugares_atencion').on('click', ".accion_editar_lugar_atencion", function() {
                console.log("abrir modal accion_editar_lugar_atencion");
                $('#editar_lugar_atencion').modal();
            });

            $('#tabla_lugares_atencion').on('click', ".accion_editar_horarios", function() {
                console.log("abrir modal accion_editar_horarios");
                $('#modal_editar_horario_atencion').modal();
            });
            $('#tabla_lugares_atencion').on('click', ".accion_editar_valores", function() {
                console.log("abrir modal accion_editar_valores");
                $('#modal_editar_valor_atencion').modal();
            });

            $('#tabla_lugares_atencion').DataTable({
                responsive: true,
            });

            $('#tabla_tons_profesional').DataTable({
                responsive: true
            });

            //cierre modales lugar atencion
            $("#cerrar_editar_asistentes").click(function() {
                $("#editar_asistentes").modal('hide');
            });
            $("#cerrar_convenio").click(function() {
                $("#modal_editar_valor_atencion").modal('hide');
            });

            $("#cerrar_convenio1").click(function() {
                $("#modal_editar_valor_atencion").modal('hide');
            });

            $("#cerrar_convenio2").click(function() {
                $("#modal_editar_valor_atencion").modal('hide');
            });


            $("#cerrar_editar_asistentes1").click(function() {
                $("#editar_asistentes").modal('hide');
            });

            $("#cerrar_editar_asistentes2").click(function() {
                $("#editar_asistentes").modal('hide');
            });

            $("#cerrar_modal_editar_horario_atencion").click(function() {
                $("#modal_editar_horario_atencion").modal('hide');
            });

            $("#cerrar_modal_editar_valor_atencion").click(function() {
                $("#modal_editar_valor_atencion").modal('hide');
            });

            $("#cerrar_modal_horario1").click(function() {
                $("#modal_editar_horario_atencion").modal('hide');
            });

            $("#cerrar_modal_horario2").click(function() {
                $("#modal_editar_horario_atencion").modal('hide');
            });

            $("#cerrar_modal_horario").click(function() {
                $("#modal_editar_horario_atencion").modal('hide');
            });

            //fin cierre modales lugar atencion

            $("#cerrar_registro_paciente_hora").click(function() {
                $("#agenda_agregar_paciente").modal('hide');
                $('#rut_paciente_reserva').val('');
            });

            $("#cerrar_tomar_hora").click(function() {
                $("#agenda_agregar_paciente").modal('hide');
                $('#rut_paciente_reserva').val('');

            });
            $("#cerrarModal").click(function() {
                $("#consulta").modal('hide')
            });
            //Primer modal//
            $("#form_nuevo_lugar_atencion").validate({
                rules: {
                    //primer modal//
                    nombre_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                    direccion_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                    numero_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                    email_lugar_atencion: {
                        required: true,
                        email: true
                    },
                    telefono_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                },
                messages: {
                    //primer modal//
                    nombre_lugar_atencion: {
                        required: "Ingrese Nombre",
                        minlength: "Por favor ingrese un Nombre vÃ¡lido"
                    },
                    direccion_lugar_atencion: {
                        required: "Ingrese DirecciÃ³n",
                        minlength: "Por favor ingrese un DirecciÃ³n vÃ¡lido"
                    },
                    numero_lugar_atencion: {
                        required: "Ingrese NÃºmero",
                        minlength: "Por favor ingrese un NÃºmero vÃ¡lido"
                    },
                    email_lugar_atencion: {
                        required: "Ingrese Correo ElectrÃ³nico",
                        email: "Por favor ingrese un Correo ElectrÃ³nico vÃ¡lido"
                    },
                    telefono_lugar_atencion: {
                        required: "Ingrese TelÃ©fono",
                        minlength: "Por favor ingrese un TelÃ©fono vÃ¡lido"
                    },
                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    console.log("AJAX");
                }
            });
            //Segundo modal//
            $("#form_editar_lugar_atencion").validate({
                // 113-313
                rules: {
                    //primer modal//
                    editar_nombre_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                    editar_direccion_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                    editar_numero_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                    editar_email_lugar_atencion: {
                        required: true,
                        email: true
                    },
                    editar_telefono_lugar_atencion: {
                        required: true,
                        minlength: 4
                    },
                },
                messages: {
                    //primer modal//
                    editar_nombre_lugar_atencion: {
                        required: "Ingrese Nombre",
                        minlength: "Por favor ingrese un Nombre vÃ¡lido"
                    },
                    editar_direccion_lugar_atencion: {
                        required: "Ingrese DirecciÃ³n",
                        minlength: "Por favor ingrese una DirecciÃ³n vÃ¡lida"
                    },
                    editar_numero_lugar_atencion: {
                        required: "Ingrese NÃºmero",
                        minlength: "Por favor ingrese un NÃºmero vÃ¡lido"
                    },
                    editar_email_lugar_atencion: {
                        required: "Ingrese Correo ElectrÃ³nico",
                        email: "Por favor ingrese un Correo ElectrÃ³nico vÃ¡lido"
                    },
                    editar_telefono_lugar_atencion: {
                        required: "Ingrese TelÃ©fono",
                        minlength: "Por favor ingrese un TelÃ©fono vÃ¡lido"
                    },
                },

                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    console.log("AJAX");
                }
            });


        });
    </script>



    <!-- Validaciones-->
    <script>
        $(document).ready(function() {

            @include('template.templateCambioContrasena')

            seleccionar_lugar_atencion_agenda();

            $('#registro_paciente_profesional').validate({
                rules: {
                    rut_paciente_agregar: {
                        required: true,
                        minlength: 9
                    },
                    nombres_paciente_agregar: {
                        required: true,
                        minlength: 3
                    },
                    apellidos_paciente_agregar: {
                        required: true,
                        minlength: 3
                    },
                    direccion_paciente_agregar: {
                        required: true,
                        minlenght: 5

                    },
                    fecha_nac_paciente_agregar: {
                        required: true
                    },
                    prevision_agregar: {
                        required: true,
                    },
                    ciudad_agregar: {
                        required: true

                    },
                    email_paciente_agregar: {
                        required: true,
                        minlength: 3
                    },
                    telefono_paciente_agregar: {
                        required: true,
                        minlength: 9
                    },

                },
                messages: {

                    rut_paciente_agregar: {
                        required: "Debe Ingresar Rut",
                        minlength: "Por favor ingrese un Rut valido 1111111-1"
                    },
                    nombres_paciente_agregar: {
                        required: "Debe Ingresar un Nombre",
                        minlength: "Por favor ingrese un nombre valido"
                    },
                    apellidos_paciente_agregar: {
                        required: "Debe Ingresar los Apellidos",
                        minlength: "Por favor ingrese apellidos validos"
                    },
                    direccion_paciente_agregar: {
                        required: "Debe Ingresar una direccion",
                        minlength: "Por favor ingrese una dirección valida"

                    },
                    fecha_nac_paciente_agregar: {
                        required: "Debe Ingresar una fecha"
                    },
                    prevision_agregar: {
                        required: "Debe seleccionar una previsión",

                    },
                    ciudad_agregar: {
                        required: "Debe Ingresar Una Ciudad",

                    },
                    email_paciente_agregar: {
                        required: "Debe Ingresar un email",
                        minlength: "Por favor ingrese un email valido"
                    },
                    telefono_paciente_agregar: {
                        required: "Debe Ingresar teléfono",
                        minlength: "Por favor ingrese un teléfono valido"
                    },

                },

            });

            $('#validacion_rut_form').validate({
                rules: {
                    rut_paciente_reserva: {
                        required: true,
                        minlength: 9
                    },
                },
                messages: {

                    rut_paciente_reserva: {
                        required: "Debe Ingresar Rut",
                        minlength: "Por favor ingrese un Rut valido 1111111-1"
                    },
                },
            });

            $('#acompanante_representante').change(function(elm) {
                if (this.checked) {
                    $('#div_info_representante').show();
                } else {
                    $('#div_info_representante').hide();
                }
            });

            $('#acompanante_acompanante').change(function(elm) {
                if (this.checked) {
                    $('#div_info_acompanante').show();
                } else {
                    $('#div_info_acompanante').hide();
                    $('#reserva_hora_id_acompanante').val('').select2();
                }
            });

            $('#autorizacion_atencion').change(function() {
                if (this.checked) {
                    $('#agenda_validar_auto_menor_edad').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#agenda_validar_auto_menor_edad').modal('show');
                    solicitarAutorizacionMenorEdad();
                } else {
                    // $('#agenda_validar_auto_menor_edad').modal('hide');
                }
            });

            $('#form_reseva_de_horas').validate({
                rules: {
                    rut_paciente_reserva: {
                        required: true,
                        minlength: 9
                    },
                    reserva_hora_nombres_paciente: {
                        required: true,
                        minlength: 3
                    },
                    reserva_hora_apellido_uno: {
                        required: true,
                        minlength: 3
                    },
                    reserva_hora_apellido_dos: {
                        required: true,
                        minlength: 3
                    },
                    reserva_hora_direccion: {
                        required: true,
                        minlenght: 5

                    },
                    reserva_hora_fecha_nac: {
                        required: true
                    },
                    reserva_hora_convenio: {
                        required: true,
                    },
                    ciudad_agregar: {
                        required: true

                    },
                    reserva_hora_correo: {
                        required: true,
                        minlength: 3
                    },
                    reserva_hora_telefono_uno: {
                        required: false,
                        celular: true,
                        minlength: 9,
                        maxlength: 9
                    },
                    reserva_hora_representante_telefono_uno: {
                        required: false,
                        celular: true,
                        minlength: 12,
                        maxlength: 12
                    },

                },
                messages: {

                    rut_paciente_reserva: {
                        required: "Debe Ingresar Rut",
                        minlength: "Por favor ingrese un Rut valido 1111111-1"
                    },
                    reserva_hora_nombres_paciente: {
                        required: "Debe Ingresar un Nombre",
                        minlength: "Por favor ingrese un nombre valido"
                    },
                    reserva_hora_apellido_uno: {
                        required: "Debe Ingresar los Apellidos",
                        minlength: "Por favor ingrese apellidos validos"
                    },
                    reserva_hora_apellido_dos: {
                        required: "Debe Ingresar los Apellidos",
                        minlength: "Por favor ingrese apellidos validos"
                    },
                    reserva_hora_direccion: {
                        required: "Debe Ingresar una direccion",
                        minlength: "Por favor ingrese una dirección valida"

                    },
                    reserva_hora_fecha_nac: {
                        required: "Debe Ingresar una fecha"
                    },
                    reserva_hora_convenio: {
                        required: "Debe seleccionar una previsión",

                    },
                    ciudad_agregar: {
                        required: "Debe Ingresar Una Ciudad",
                    },
                    reserva_hora_correo: {
                        required: "Debe Ingresar un email",
                        minlength: "Por favor ingrese un email valido"
                    },
                    reserva_hora_telefono_uno: {
                        required: "Debe Ingresar teléfono",
                        minlength: "Por favor ingrese un teléfono valido"
                    },

                },

            });


            $('#validacion_rut_asistente_form').validate({
                rules: {
                    rut_paciente_reserva: {
                        required: true,
                        minlength: 9
                    },
                },
                messages: {

                    rut_paciente_reserva: {
                        required: "Debe Ingresar Rut",
                        minlength: "Por favor ingrese un Rut valido 1111111-1"
                    },
                },
            });

            $.validator.addMethod("celular", function(value, element, pattern) {
                if (value != '') {
                    var re = new RegExp(/^\d{9}$/);
                    return re.test(value);
                } else
                    return true;
            }, "Numero no valido. Ejemplo: 912341234");

        });
    </script>


    <script>
        /** script para carga de informacion de paciente en examenes */

        if ($('#rut_paciente').length > 0) {
            const rut_paciente = document.getElementById('rut_paciente');
            rut_paciente.addEventListener('blur', (event) => {
                console.log('buscando Paciente');
                buscar_paciente_examenes();
            });
        }

        function buscar_paciente_examenes() {

            let rut = $('#rut_paciente').val();
            // let url = "https://www.med-sdi.cl/Profesional/buscar_rut";
            let url = "{{ route('profesional.buscar_rut_paciente') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut: rut,
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {

                        data = JSON.parse(data);

                        $('#nombres_paciente').val(data.nombres);
                        $('#apellidos_paciente').val(data.apellido_uno + ' ' + data.apellido_dos);
                        $('#email_paciente').val(data.email);
                        $('#code_paciente').val(data.code);
                        $('#id_paciente').val(data.id);
                        buscar_atencion(data.id);

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function buscar_atencion(id_paciente) {
            let code = $('#code_paciente').val();
            // let url = "https://www.med-sdi.cl/api/Paciente/getMisAtenciones";
            let url = "{{ route('api.Paciente.getMisAtenciones') }}";

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        code: code,
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {

                        data = JSON.parse(data);
                        console.log(data);
                        ficha = data.Fichas;

                        for (var i = 0; i < ficha.length; i++) {
                            var fecha = ficha[i].created_at;
                            fecha = new Date(fecha);
                            var fecha2 = fecha.toLocaleDateString("es");
                            $('#id_ficha_atencion').append(`<option value="${ficha[i].id}">
                                 ${fecha2}
                           </option>`);
                        }


                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }


        function convertToBase64() {
            //Read File
            var selectedFile = document.getElementById("adjuntar_examen_receta_online").files;
            //Check File is not Empty
            if (selectedFile.length > 0) {
                // Select the very first file from list
                var fileToLoad = selectedFile[0];
                // FileReader function for read the file.
                var fileReader = new FileReader();
                var base64;
                // Onload of file read the file content
                fileReader.onload = function(fileLoadedEvent) {
                    base64 = fileLoadedEvent.target.result;
                    // Print data in console
                    //console.log(base64);
                    $('#adjuntar_examen_receta_online_base64').val(base64);
                };
                // Convert data to base64
                fileReader.readAsDataURL(fileToLoad);
                console.log(fileReader);

            }
        }


        /** registro de examen por Profesional*/
        function guardar_examen() {

            // let url = "https://www.med-sdi.cl/examen_ppf";
            let url = "{{ route('examen_ppf.registrar') }}";

            // var email_paciente = $('#email_paciente').val();
            var id_paciente = $('#id_paciente').val();
            // var code_paciente = $('#code_paciente').val();
            var _token = $('#_token').val();
            var id_profesional = $('#id_profesional').val();
            // var rut_paciente = $('#rut_paciente').val();
            // var nombres_paciente = $('#nombres_paciente').val();
            // var apellidos_paciente = $('#apellidos_paciente').val();
            var id_ficha_atencion = $('#id_ficha_atencion').val();
            var t_examen = $('#t_examen').val();
            var n_examen = $('#n_examen').val();
            // var fecha_paciente = $('#fecha_paciente').val();
            // var adjuntar_examen_receta_online = $('#adjuntar_examen_receta_online').val();
            var adjuntar_examen_receta_online_base64 = $('#adjuntar_examen_receta_online_base64').val();



            $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        //email_paciente: email_paciente,
                        id_paciente: id_paciente,
                        //code_paciente: code_paciente,
                        _token: _token,
                        id_profesional: id_profesional,
                        //rut_paciente: rut_paciente,
                        //nombres_paciente: nombres_paciente,
                        //apellidos_paciente: apellidos_paciente,
                        id_ficha_atencion: id_ficha_atencion,
                        t_examen: t_examen,
                        n_examen: n_examen,
                        //fecha_paciente: fecha_paciente,
                        //adjuntar_examen_receta_online: adjuntar_examen_receta_online,
                        adjuntar_examen_receta_online_base64: adjuntar_examen_receta_online_base64,
                    },
                })
                .done(function(data) {

                    if (data !== 'null') {
                        //data = JSON.parse(data);
                        console.log('-----------------------');
                        console.log(data);
                        console.log('-----------------------');
                        if (data.estado == 1) {
                            swal({
                                title: "Se ha Subido el Examen de forma Correcta",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                            // Swal.clickConfirm();
                            setTimeout(function() {
                                location.reload()
                            }, 1000);
                        } else {

                            swal({
                                title: "Problema al Subir Examen. Complete el formulario.",
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }


                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function recepcion_pago() {
            let token = CSRF_TOKEN;
            var bono_paciente_rut = $('#bono_paciente_rut').val();
            var bono_paciente_nombre = $('#bono_paciente_nombre').val();
            var bono_profesional_nombre = $('#bono_profesional_nombre').val();
            var bono_profesional_rut = $('#bono_profesional_rut').val();
            var bono_numero = $('#bono_numero').val();
            var bono_valor_bonificacion = $('#valor_bonificacion').val();
            var bono_valor_seguro = $('#valor_seguro').val();
            var bono_valor_consulta = $('#bono_valor_consulta').val();
            var bono_prevision = $('#bono_prevision').val();
            var bono_prevision_nombre = $('#bono_prevision option:selected').text();
            var recepcion_programa = $('#recepcion_programa').val();
            var bono_sn_sesiones = $('#bono_sn_sesiones').val();

            var bono_hora_medica = $('#bono_hora_medica').val();
            var bono_id_profesional = $('#bono_id_profesional').val();
            var bono_id_paciente = $('#bono_id_paciente').val();
            var bono_id_tipo_bono = $('#bono_id_tipo_bono').val();
            var bono_id_clase_bono = $('#bono_id_clase_bono').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();

            var mensaje = '';
            var valido = 1;

            if (bono_paciente_rut == '') {
                mensaje += 'Campo requerido RUT DEL PACIENTE\n';
                valido = 0;
            }
            if (bono_paciente_nombre == '') {
                mensaje += 'Campo requerido NOMBRE DEL PACIENTE\n';
                valido = 0;
            }
            if (bono_profesional_nombre == '') {
                mensaje += 'Campo requerido NOMBRE DEL PROFESIONAL\n';
                valido = 0;
            }
            if (bono_profesional_rut == '') {
                mensaje += 'Campo requerido RUT DEL PROFESIONAL\n';
                valido = 0;
            }
            // if (parseInt(bono_id_clase_bono) !== 6 && parseInt(bono_id_clase_bono)  !== 2 && parseInt(bono_id_clase_bono)  !== 8) {
            //     if (bono_numero == '') {
            //         mensaje += 'Campo requerido NUMERO DEL BONO O PROGRAMA\n';
            //         valido = 0;
            //     }
            //     var suma = parseInt(bono_valor_bonificacion) + parseInt(bono_valor_seguro) + parseInt(bono_valor_consulta);
            //     if (suma !== 26830) {
            //         mensaje += 'El valor total no coincide con valor actual del bono\n';
            //         valido = 0;
            //     }
            //     console.log(suma);
            //     if( bono_valor_seguro == '') {
            //         mensaje += 'Campo requerido VALOR SEGURO\n';
            //         valido = 0;
            //     }
            //     if (bono_valor_consulta == '') {
            //         mensaje += 'Campo requerido VALOR TOTAL\n';
            //         valido = 0;
            //     }
            //     if (bono_prevision == '' || bono_prevision == 0) {
            //         mensaje += 'Campo requerido CONVENIO\n';
            //         valido = 0;
            //     }
            // }
            // if( bono_valor_bonificacion == '') {
            //     mensaje += 'Campo requerido VALOR BONIFICACION\n';
            //     valido = 0;
            // }



            if (valido == 1) {
                let url = "{{ route('profesional.recibir_bono') }}";
                $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            // _token: token,
                            _token: CSRF_TOKEN,
                            convenio: bono_prevision,
                            convenio_nombre: bono_prevision_nombre,
                            numero_bono: bono_numero,
                            valor_bonificacion: bono_valor_bonificacion,
                            valor_seguro: bono_valor_seguro,
                            valor_atencion: bono_valor_consulta,
                            glosa: '1',
                            id_profesional: bono_id_profesional,
                            id_asistente: '-1',
                            id_paciente: bono_id_paciente,
                            id_tipo_bono: bono_id_tipo_bono,
                            id_clase_bono: bono_id_clase_bono,
                            id_referencia: bono_hora_medica, //une bono a hora medica (para buscar id ficha atencion)
                            id_lugar_atencion: id_lugar_atencion,
                            numero_sesiones: bono_sn_sesiones
                        }
                    })
                    .done(function(data) {
                        if (data !== 'null') {
                            //data = JSON.parse(data);
                            console.log('-----------------------');
                            console.log(data);
                            console.log('-----------------------');
                            if (data.estado == 1) {
                                swal({
                                    title: "Recepción de bonos y programas",
                                    text: 'Pago Exitoso',
                                    icon: "success",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                                // cargarAgendaProfesional(bono_id_profesional, data.hora_medica.fecha_consulta);
                                @if (isset($lugar_atencion))
                                    cargarAgendaProfesional($('#id_tipo_agenda').val(), '{{ $lugar_atencion }}',
                                        bono_id_profesional, data.hora_medica.fecha_consulta);
                                @endif

                                $('#modal_recepcion_bonos_api').modal('hide');
                                $('#bono_paciente_rut').val('');
                                $('#bono_paciente_nombre').val('');
                                $('#bono_profesional_nombre').val('');
                                $('#bono_profesional_rut').val('');
                                $('#bono_numero').val('');
                                $('#bono_valor_consulta').val('');
                                $('#bono_prevision').val('');
                                $('#recepcion_programa').val('');
                                $('#bono_sn_sesiones').val('');
                                $('#bono_hora_medica').val('');
                                {{--  $('#bono_id_profesional').val('');  --}}
                                {{--  $('#bono_id_paciente').val('');  --}}
                                {{--  $('#bono_id_tipo_bono').val('');  --}}

                            } else {
                                var mensaje = '';
                                if ((data.bono)) {
                                    if (data.bono.estado == 0) {
                                        mensaje += bono.estado.msj;
                                    }
                                    if (data.hora_medica.estado == 0) {
                                        mensaje += data.hora_medica.msj;
                                    }
                                } else {
                                    mensaje += data.error.id_referencia;
                                }

                                swal({
                                    title: "Recepción de bonos y programas",
                                    text: 'Pago con Problemas.\n' + data.msj + '\n' + mensaje,
                                    icon: "error",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });

                            }
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log('fail');
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            } else {
                swal({
                    title: "Recepción de bonos y programas",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        }

        function ver_pdf_certificado_reposo(id_ficha_atencion) {

            let url = "{{ route('pdf.certificado_reposo') }}";
            Fancybox.show(
                [{
                    src: '{{ route('pdf.certificado_reposo') }}?id_ficha_atencion=' + id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                }, ]
            );
        }

        function ver_pdf_informe_medico(id_ficha_atencion) {

            let url = "{{ route('pdf.informe_medico') }}";
            Fancybox.show(
                [{
                    src: '{{ route('pdf.informe_medico') }}?id_ficha_atencion=' + id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                }, ]
            );
        }

        function ver_pdf_uso_personal(id_ficha_atencion) {

            let url = "{{ route('pdf.uso_personal') }}";
            Fancybox.show(
                [{
                    src: '{{ route('pdf.uso_personal') }}?id_ficha_atencion=' + id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                }, ]
            );
        }

        function ver_pdf_receta(id_ficha_atencion) {

            let url = "{{ route('pdf.receta_medicamentos') }}";
            Fancybox.show(
                [{
                    src: '{{ route('pdf.receta_medicamentos') }}?id_ficha_atencion=' + id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                }, ]
            );
        }

        function ver_pdf_orden_examenes(id_ficha_atencion) {

            let url = "{{ route('pdf.orden_examenes') }}";
            Fancybox.show(
                [{
                    src: url + '?id_ficha_atencion=' + id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                }, ]
            );
        }

        function ver_pdf_interconsulta(id_interconsulta) {

            let url = "{{ route('pdf.interconsulta') }}";
            Fancybox.show(
                [{
                    src: '{{ route('pdf.interconsulta') }}?id_interconsulta=' + id_interconsulta,
                    type: "iframe",
                    preload: false,
                }, ]
            );
        }

        function buscar_ficha_atencion(id_ficha_atencion) {
            let url = "{{ route('ficha_clinica.get_ficha') }}";


            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_ficha_atencion: id_ficha_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {

                        if (response['estado'] == '1') {
                            $('#m_consultaantLabel').html('Datos de Consulta de: ' + response.paciente.nombre);
                            $('#label_motivo').html(response.registros.motivo);
                            $('#label_examen_fisico').html(response.registros.examen_fisico);
                            $('#label_antecedentes').html(response.registros.antecedentes);
                            $('#label_diagnostico').html(response.registros.hipotesis_diagnostico);


                        } else {
                            $('#label_motivo').html('');
                            $('#label_examen_fisico').html('');
                            $('#label_antecedentes').html('');
                            $('#label_diagnostico').html('');
                        }
                        $('#m_consultaant').modal('show');
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
        }

        function validar_donante_organo_total() {
            if ($('input:radio[name=edit_donante_total]:checked').val() == 1) {
                $('.div_edit_donante_parcial').hide();
                $('.div_edit_comentario').hide();
                $('.div_edit_comentario_impedimento').hide();
                $("#edit_donante_parcial").prop("checked", false);
                $('#comentarios_organo').val('');
                $('#comentarios_impedimento').val('');
            } else {
                $('.div_edit_donante_parcial').show();
                $("#edit_donante_parcial").prop("checked", true);
                $('.div_edit_comentario').show();
                $('.div_edit_comentario_impedimento').hide();
            }
        }

        function validar_donante_organo_parcial() {
            if ($('input:radio[name=edit_donante_parcial]:checked').val() == 1) {
                $('.div_edit_comentario').show();
                $('.div_edit_comentario_impedimento').hide();
                $('#comentarios_impedimento').val('');
            } else {
                $('.div_edit_comentario').hide();
                $('.div_edit_comentario_impedimento').show();
                $('#comentarios_organo').val('');
            }
        }

        function validar_donante_organo_parcial() {
            if ($('input:radio[name=edit_donante_parcial]:checked').val() == 1) {
                $('.div_edit_comentario').show();
                $('.div_edit_comentario_impedimento').hide();
                $('#comentarios_impedimento').val('');
            } else {
                $('.div_edit_comentario').hide();
                $('.div_edit_comentario_impedimento').show();
                $('#comentarios_organo').val('');
            }
        }

        function antecedente_cambiar_enfermedad_cronica() {
            $('#id_ant_nombre_patologia_cronica').val($('#ant_nombre_patologia_cronica').val());
        }

        function getDosis(id_medicamento, div_dosis) {

            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#' + div_dosis);

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="' + v.id +
                                '" data-cant_comp="' + v.cant_comp + '">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function buscar_diagnosticos_cie10() {
            $('#tabla_configuracion_cie10').dataTable().fnClearTable();
            $('#tabla_configuracion_cie10').dataTable().fnDestroy();
            var texto = $('#text_busqueda_cie10').val();

            let url = "{{ route('profesional.buscar_diagnosticos_cie10') }}";
            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        descripcion: texto.toUpperCase(),
                    },
                })
                .done(function(data) {
                    console.log(data)


                    if (data != null) {
                        if (data.estado == 1) {
                            $('#tabla_configuracion_cie10 tbody').html('');
                            for (i = 0; i < data.registros.length; i++) {

                                var id = data.registros[i].id;
                                var codigo = data.registros[i].codigo;
                                var descripcion = data.registros[i].descripcion;
                                var activo = data.registros[i].activo;

                                var j = 1; //contador para asignar id al boton que borrara la fila
                                var fila = '';
                                fila += '<tr class="tr_diagnostico" id="row' + id + '">';
                                fila += '    <td style="width: 10%;">' + codigo + '</td>';
                                fila += '    <td style="width: 70%;">' + descripcion + '</td>';
                                fila += '    <td style="width: 9%;">';
                                fila += '        <div class="switch switch-success d-inline m-r-10">';
                                fila += '           <input type="checkbox" id="diagnostico_' + id + '" data-id="' + id +
                                    '">';
                                fila += '           <label for="diagnostico_' + id + '" class="cr"></label>';
                                fila += '       </div>';
                                fila += '   </td>';
                                fila += '</tr>';
                                j++;

                                $('#tabla_configuracion_cie10 tbody').append(fila);
                                if (activo == 1)
                                    $('#diagnostico_' + id + '').trigger('click');
                            }
                        } else {
                            $('#tabla_configuracion_cie10 tbody').html('');
                            $('#tabla_configuracion_cie10 tbody').append(
                                '<td colspan="3">Sin Diagnósticos de busqueda</td>');
                        }


                    } else {

                        $('#tabla_configuracion_cie10 tbody').html('');
                        $('#tabla_configuracion_cie10 tbody').append(
                            '<td colspan="3">Sin Diagnósticos de busqueda</td>');

                    }


                    $('#tabla_configuracion_cie10').DataTable({
                        "pageLength": 100,
                        "searching": false,
                        responsive: true,
                        "bPaginate": true,
                    });



                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function activar_diagnosticos_cie10() {
            var estado = $('#todos_diagnosticos_cie10').is(':checked')

            $("input:checkbox").each(function() {
                if ($(this).attr('id') != 'todos_diagnosticos_cie10') {
                    if (estado != $(this).is(':checked')) {
                        $(this).trigger('click');
                    }
                }
            });
        }

        function guardar_diagnosticos_cie10_profesional() {
            var lista_diagnostico = []

            $("input:checkbox").each(function() {
                if ($(this).attr('id') != 'todos_diagnosticos_cie10') {
                    {{--
                console.log($(this).attr('id'));
                console.log($(this).attr('data-id'));
                console.log($(this).is(':checked'));
                --}}

                    lista_diagnostico.push([$(this).attr('data-id'), $(this).is(':checked')]);
                }
            });

            {{--  console.log(lista_diagnostico);  --}}

            let token = CSRF_TOKEN;
            let url = "{{ route('profesional.registrar_diagnosticos_cie10') }}";
            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        _token: CSRF_TOKEN,
                        lista_diagnostico: lista_diagnostico,
                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {
                        if (data.estado == 1) {
                            swal({
                                title: "Registro de Diagnostico Cie10",
                                text: "Registros modificados con Exito",
                                icon: "success"
                            })
                        }
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function editar_ant_confidencial_paciente(id) {
            let id_paciente = id;

            let edit_rompe_clave = $('input:radio[name=edit_rompe_clave]:checked').val();

            let antecedentes_confidenciales = $('#antecedentes_medicos_conf').val();
            let otros_antecedentes_confidenciales = $('#otros_antecedentes_medicos_conf').val();


            let url = "{{ route('profesional.editar_antecedentes_confidenciales_paciente') }}";


            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_paciente: id_paciente,
                        rompeclave: edit_rompe_clave,
                        antecedentes: antecedentes_confidenciales,
                        otros_antecedentes: otros_antecedentes_confidenciales,
                    },
                })
                .done(function(data) {

                    if (data != 'failed') {

                        swal({
                            title: "se modifico antecedentes confidenciales del paciente",
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);
                        // alert('se modifico antecedentes del paciente');
                        // location.reload();

                    } else {
                        swal({
                            title: "Error al modificar los antecedentes confidenciales",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('Error al modificar los antecedentes');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function modificar_registro_academico(id) {
            var profesion = $('#' + id + '_profesion').val();
            var universidad = $('#' + id + '_universidad').val();
            var anio = $('#' + id + '_anio').val();
            var ciudad_pais = $('#' + id + '_ciudad_pais').val();
            var supersalud = $('#' + id + '_supersalud').val();
            var numero_colegio = $('#' + id + '_numero_colegio').val();

            let url = "{{ route('profesional.editar_antecedente_academico') }}";
            let token = CSRF_TOKEN;

            $.ajax({

                    url: url,
                    type: "POST",
                    data: {
                        _token: CSRF_TOKEN,
                        id: id,
                        nombre: profesion,
                        universidad: universidad,
                        anio: anio,
                        ciudad_pais: ciudad_pais,
                        supersalud: supersalud,
                        numero_colegio: numero_colegio,
                    },
                })
                .done(function(data) {

                    if (data.estado == 1) {

                        swal({
                            title: "se modifico antecedentes académicos",
                            icon: "success",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);
                        // alert('se modifico antecedentes del paciente');
                        // location.reload();

                    } else {
                        swal({
                            title: "Error al modificar los antecedentes académicos",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('Error al modificar los antecedentes');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function carga_tipo_especialidad(input_origen, input_destino, id) {
            var id_especialidad = $('#' + input_origen).val();

            if (id_especialidad) {
                let url = "{{ route('web.profesional.buscar_tipo_especialidad') }}";

                $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            id_especialidad: id_especialidad
                        },
                    })
                    .done(function(data) {

                        if (data.estado == 1) {
                            let tipo_especialidades = $('#' + input_destino);

                            tipo_especialidades.find('option').remove();
                            tipo_especialidades.append('<option value="">Seleccione</option>');
                            if (data.registros.length > 0) {
                                $(data.registros).each(function(i, v) { // indice, valor
                                    tipo_especialidades.append('<option value="' + v.id + '">' + v.nombre +
                                        '</option>');
                                })
                            } else {
                                tipo_especialidades.append('<option value="0">No Aplica</option>');
                                tipo_especialidades.val(0);
                            }
                            if (id != '')
                                tipo_especialidades.val(id);
                        } else {
                            console.log('sin registros');
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }
        }

        function carga_sub_tipo_especialidad(input_origen, input_destino, id) {
            var id_tipo_especialidad = $('#' + input_origen).val();

            if (id_tipo_especialidad) {
                let url = "{{ route('web.profesional.buscar_sub_tipo_especialidad') }}";

                $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            id_tipo_especialidad: id_tipo_especialidad
                        },
                    })
                    .done(function(data) {

                        if (data.estado == 1) {
                            let sub_tipo_especialidades = $('#' + input_destino);

                            sub_tipo_especialidades.find('option').remove();
                            sub_tipo_especialidades.append('<option value="">Seleccione</option>');
                            if (data.registros.length > 0) {
                                $(data.registros).each(function(i, v) { // indice, valor
                                    sub_tipo_especialidades.append('<option value="' + v.id + '">' + v.nombre +
                                        '</option>');
                                })
                            } else {
                                sub_tipo_especialidades.append('<option value="0">No Aplica</option>');
                                sub_tipo_especialidades.val(0);
                            }
                            if (id != '')
                                sub_tipo_especialidades.val(id);
                        } else {
                            console.log('sin registros');
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }
        }

        function cargar_flujo_caja_rendicion_diario() {
            var fecha = $('#gestion_diario_fecha').val();
            var asistente = $('#gestion_diario_asistente').val();
            var convenio = $('#gestion_diario_convenio').val();
            var estado_consulta = $('#gestion_diario_estado_consulta').val();

            let url = "{{ route('flujo_caja.data_flujo_caja_diario') }}";
            let data = {
                fecha: fecha,
                asistente: asistente,
                convenio: convenio,
                estado_consulta: estado_consulta,
                _token: CSRF_TOKEN
            };

            $.ajax({
                    url: url,
                    type: "POST",
                    data: data
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        let bonos = data.bonos;
                        let table = $('#tabla_gestion_bonos_diarios').DataTable();
                        table.clear();

                        bonos.forEach(bono => {
                            let paciente = bono.paciente;
                            let convenio = bono.convenio;
                            let tipo = bono.tipo_bono;
                            let switchId = 'switch_' + paciente.rut;
                            let nombre_convenio = convenio ? convenio.nombre : 'FONASA';

                            let asistente_nombre = bono.asistente
                                ? `${bono.asistente.nombres} ${bono.asistente.apellido_uno}`
                                : 'Sin asistente';
                            let asistente_rut = bono.asistente
                                ? bono.asistente.rut
                                : '';

                            table.row.add([
                                nombre_convenio,
                                bono.numero_sesiones,
                                bono.numero_bono,
                                tipo.nombre,
                                bono.fecha_atencion,
                                `${paciente.nombres} ${paciente.apellido_uno} ${paciente.apellido_dos}<br><span>${paciente.rut}</span>`,
                                `$${Number(bono.valor_atencion).toLocaleString('es-CL', {minimumFractionDigits: 2})}`,
                                bono.estado_consulta,
                                `<span>${asistente_nombre}</span> <br><span>${asistente_rut}</span>`
                            ]);
                        });

                        table.draw();

                    } else {
                        alert('No se encontraron datos.');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.error(jqXHR, ajaxOptions, thrownError);
                });
        }
    </script>

    @yield('page-script')
    @yield('btn-script-agenda')
</body>

</html>
