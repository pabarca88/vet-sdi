<!DOCTYPE html>
<html lang="es">

<head>


    @include('atencion_medica.include.head_siquiatria')

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Links del REG-->
    <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}?t={{ time() }}">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone.min.css') }}?t={{ time() }}">

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

    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}?t=<?= time() ?>">

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!--formulario sm-->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
    {{--  /** agregar css */  --}}

    <style>
        .ui-front {
            position: absolute;
            z-index: 2006;
            overflow: auto;
        }

    </style>
    @yield('css-btn-autorizacion')
</head>
<body>
    @include('template.profesional.header')
    @include('template.menuProfesional')
    @yield('Content')

    <!-- Modal de la vista -->
    @yield('Modals')
    @yield('Modals-med-exa')
    @yield('Modals-med-exa-esp')
    @yield('modal-ficha-general-espc')


    <!-- Modal de la vista fin -->



    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/documentos.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

    <script src="{{ asset('js/sidebar.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Tablas-->
    <script src="{{ asset('js/tablas_fmu.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/tabla_atenciones_medicas_previas.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/tablas_control_cronicos.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="{{ asset('js/recetas_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/licencias_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>


    <!--Formularios Modals-->
    <script src="{{ asset('js/modals_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

    <!--Tooltips-->
    <script src="{{ asset('js/tooltip_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Check-->
    <script src="{{ asset('js/check_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone-amd-module.min.js') }}"></script>

    <!-- mensajes -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

{{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    {{--  @include('template.templateAutorizacion')  --}}


    <!-- form-advance custom js -->
    {{--  <script src="{{ asset('js/pages/form-advance-custom.js') }}?upd={{ random_int(1111,9999) }}"></script>  --}}

    <!--Apgar-->
    <script src="{{ asset('js//aicalc2.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Botón cards-->
    <script src="{{ asset('js/btn-cards.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Modals Sidebar derecho-->
    <script src="{{ asset('js/modals_sidebar_esp.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Tablas y Toggle atención ginecobstetrica-->
    <script src="{{ asset('js/atencion_especialidades.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    </script>
    <script>
        /** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function  envio_indicaciones_pdf(id_modal){
            let url = "{{ route('indicacion.medica.registro.envio') }}";
            var id_tipo_documento = 1;
            var id_paciente = $('#id_paciente_fc').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var observacion = '';
            // var observacion = $('#observacion').val();
            var documento = '';
            var url_documento = '';
            var cuerpo = '';
            var otro = '';
            var token = CSRF_TOKEN;

            if(id_tipo_documento == 1)
            {
                documento = $('#'+id_modal+' embed').attr('data-documento');
                url_documento = $('#'+id_modal+' embed').attr('data-url');
            }
            else
            {
                // cuerpo = $('#cuerpo').val();
            }
            var datos = {};
            datos._token = token;
            datos.id_tipo_documento = id_tipo_documento;
            datos.id_paciente = id_paciente;
            datos.id_profesional = id_profesional;
            datos.id_ficha_atencion = id_ficha_atencion;
            datos.id_lugar_atencion = id_lugar_atencion;
            datos.observacion = observacion;
            datos.documento = documento;
            datos.url = url_documento;
            datos.cuerpo = cuerpo;
            datos.otro = otro;

            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: datos,
                success: function(data) {
                    // console.log(data);
                    if(data.estado == 1)
                    {
                        var mensaje = '';
                        mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                        if(data.update_correo.estado == 1)
                            mensaje = 'Documento enviado por correo al Paciente.\n';
                        else
                            mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: mensaje,
                            icon: "success",
                        });
                    }
                    else
                    {
                        var texto_error = '';

                        if(data.estado ==  0)
                        {
                            if('error' in data)
                            {
                                $.each(data.error, function (indexInArray, valueOfElement) {
                                    texto_error += indexInArray+': '+valueOfElement+'\n';
                                });
                            }
                        }
                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });
                    }
                }
            });
        }
        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
    function editarInformacionContacto(){
            $('#modal_editar_contacto').modal('show');
            $('#info_contacto').css('display', 'none');
            $('#info_contacto-edit').css('display', 'block');
        }



        function cancelarInformacionContacto(){
            $('#info_contacto').css('display', 'block');
            $('#info_contacto-edit').css('display', 'none');
        }

         function guardarInformacionContacto(){
            console.log('editando');
            let rut = $('#contacto_rut_edit').val();
            let nombre = $('#contacto_nombre_edit').val();
            let apellido_uno = $('#contacto_apellido_uno').val();
            let apellido_dos = $('#contacto_apellido_dos').val();
            let fn = $('#contacto_fn_edit').val();
            let sexo = $('#contacto_sexo_edit').val();
            let direccion = $('#contacto_dir_edit').val();
            let region = $('#contacto_region_edit').val();
            let comuna = $('#contacto_comuna_edit').val();
            let email = $('#contacto_email_edit').val();
            let telefono = $('#contacto_telefono_edit').val();

            let data = {
                rut: rut,
                nombre: nombre,
                apellido_uno: apellido_uno,
                apellido_dos: apellido_dos,
                fn: fn,
                sexo: sexo,
                direccion: direccion,
                region: region,
                comuna: comuna,
                email: email,
                telefono: telefono,
                _token: CSRF_TOKEN
            }

            console.log(data);
             let url = "{{ ROUTE('asistente.contacto.modificar') }}";

            $.ajax({

                url: url,
                type: "get",
                data: data,
                })
                .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    if (data.estado == 1)
                    {
                        let contacto = data.contacto;
                        $('#nombre_completo_contacto').text(contacto.nombres);
                        $('#apellidos_contacto').text(contacto.apellido_uno + ' ' + contacto.apellido_dos)

                        $('#email_contacto_').text(contacto.email);
                        $('#telefono_contacto').text(contacto.telefono_uno);
                        $('#comuna_region_contacto').html(contacto.ciudad + '<br> ' + contacto.region);

                        // $('.paciente_view_asistente').show();
                        // $('.paciente_edit_asistente').hide();
                        // $('#modificando_paciente_asistente').val(0);

                        swal({
                            title: "Actualización de Contacto",
                            text: "Actualización Exitosa",
                            icon: "success",
                        });
                        cancelarInformacionContacto();
                    }
                    else
                    {
                        swal({
                            title: "Actualización de Paciente",
                            text: "Falla en Actualización.\nIntente de nuevo.",
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Actualización de Paciente",
                        text: "Falla en Actualización.\nIntente de nuevo.",
                        icon: "error",
                    });
                }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function editarInformacionPaciente(){
            $('#modal_editar_paciente').modal('show');
            $('#info_paciente').css('display', 'none');
            $('#info_paciente-edit').css('display', 'block');
        }

        function cancelarInformacionPaciente(){
            $('#info_paciente').css('display', 'block');
            $('#info_paciente-edit').css('display', 'none');
        }

        function guardarInformacionPaciente(){
            let id_paciente = $('#id_paciente').val();
            let nombres = $('#paciente_nombre_edit').val();
            let apellido_uno = $('#paciente_apellido_uno_edit').val();
            let apellido_dos = $('#paciente_apellido_dos_edit').val();
            let fecha_nac = $('#paciente_fn_edit').val();
            let sexo = $('#paciente_sexo_edit').val();
            let direccion = $('#paciente_dir_edit').val();
            let region = $('#paciente_region_edit').val();
            let comuna = $('#paciente_comuna_edit').val();
            let email = $('#paciente_email_edit').val();
            let telefono = $('#paciente_telefono_edit').val();

            let data = {
                id: id_paciente,
                nombre: nombres,
                apellido_uno: apellido_uno,
                apellido_dos: apellido_dos,
                fecha_nacimiento: fecha_nac,
                sexo: sexo,
                direccion: direccion,
                region: region,
                ciudad: comuna,
                email: email,
                telefono: telefono,
                _token: CSRF_TOKEN
            }

            console.log(data);
            let url = "{{ route('asistente.paciente.modificar') }}";

            $.ajax({

                url: url,
                type: "get",
                data: data,
                })
                .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    if (data.estado == 1)
                    {
                        let paciente = data.paciente;
                        $('#nombre_completo_paciente').text(paciente.nombres + ' ' + paciente.apellido_uno + ' ' + paciente.apellido_dos);
                        $('#fecha_nac_paciente').text(paciente.fecha_nac);
                        if (paciente.sexo == 'M') {
                            $('#sexo_paciente').text('Masculino');
                        } else {
                            $('#sexo_paciente').text('Femenino');
                        }
                        $('#email_paciente_').text(paciente.email);
                        $('#telefono_paciente').text(paciente.telefono_uno);
                        $('#comuna_region_paciente').html(paciente.ciudad + '<br> ' + paciente.region);

                        // $('.paciente_view_asistente').show();
                        // $('.paciente_edit_asistente').hide();
                        // $('#modificando_paciente_asistente').val(0);

                        swal({
                            title: "Actualización de Paciente",
                            text: "Actualización Exitosa",
                            icon: "success",
                        });
                        cancelarInformacionPaciente();
                    }
                    else
                    {
                        swal({
                            title: "Actualización de Paciente",
                            text: "Falla en Actualización.\nIntente de nuevo.",
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Actualización de Paciente",
                        text: "Falla en Actualización.\nIntente de nuevo.",
                        icon: "error",
                    });
                }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
                });
        }
    </script>
    @yield('js_inferior')
    @yield('page-script')
    @yield('page-script-ficha-atencion'){{-- ficha_orl.blade --}}
    @yield('js-ficha-general-espc') {{-- seccion js fiche general especialidad --}}
    @yield('page-script-med-exa') {{--  seccion receta y exmaenes --}}
    @yield('page-script-med-exa-esp') {{-- seccion receta y exmaenes especiales --}}
    @yield('js-sidebar') {{-- seccion js side bar --}}
    @yield('js-lic') {{-- seccion js side bar --}}
	@yield('page-script-btn-autorizacion')
</body>

</html>
