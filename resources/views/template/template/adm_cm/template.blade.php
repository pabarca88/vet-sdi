<!DOCTYPE html>
<html lang="es">

<head>
    <title>Centro Médico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/escritorio_laboratorio.css') }}?t={{ time() }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Rating css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/bars-1to10.css') }}'/>

    <link rel="stylesheet" href='{{ asset('css/boton-flotante.css') }}'/>

    <!--Estilos base-->
    <link rel="stylesheet" href='{{ asset('css/style.css') }}'/>

    <!--Estilos escritorios-->
    <link rel="stylesheet" href='{{ asset('css/escritorios.css') }}'/>

    <!--Estilos formularios sm-->
    <link rel="stylesheet" href='{{ asset('css/formulario_sm.css') }}'/>

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/tabs-secciones.css') }}'/>

    <!--Tags-->
    <link rel="stylesheet" href='{{ asset('css/plugins/bootstrap-tagsinput.css') }}'/>
    <link rel="stylesheet" href='{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}'/>

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/dropzone.min.css') }}'/>

    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/accordion.css') }}'/>
    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/card_sidebar.css') }}'/>
    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/pills_modals.css') }}'/>

    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/tab_wizard_formularios.css') }}'/>

    <!-- select2 -->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/plugins/select2.min.css') }}'/>

    <!--Bs-Canvas-->
    <link rel="stylesheet" href='{{ asset('css/bs_canvas.css') }}'/>

</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>

    @include('template.adm_cm.menu')
    @include('template.adm_cm.header')


    @yield('content')
    @yield('modales-profesionales_inst')
    @yield('modales')



    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}
    <script src="{{ asset('js/modals_dental.js') }}"></script>

    <!-- bootstrap-tagsinput-latest Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="{{ asset('js/plugins/bootstrap-tagsinput.min.js') }}"></script>

    <!-- form-advance custom js -->
    {{--  <script src="{{ asset('js/pages/form-advance-custom.js') }}"></script>  --}}

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>


    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

    <!--Modals-->
    <script src="{{ asset('js/modals_admin_cm.js') }}"></script>
    <script src="{{ asset('js/modals_centro_medico.js') }}"></script>
    <!--Tablas-->
    <script src="{{ asset('js/tablas_admin_cm.js') }}"></script>
    <script src="{{ asset('js/tablas_centro_medico.js') }}"></script>

    <!--Gráficos-->
    <!-- Rating Js -->
    <script src="{{ asset('js/plugins/jquery.barrating.min.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('js/plugins/apexcharts.min.js') }}"></script>
    <!-- peity chart js -->
    <script src="{{ asset('js/plugins/jquery.peity.min.js') }}"></script>
    <!-- validador de rut -->
    <script src="{{ asset('js/rut.min.js') }}"></script>

    <!--Gráficos-->
    {{--  <script src="{{ asset('js/graficos/sf-prof-admin-cm.js') }}"></script>
    <script src="{{ asset('js/graficos/rech-horas-prof-admin-cm.js') }}"></script>  --}}

    {{--  <script src="{{ asset('js/graficos/sf-lab-admin-cm.js') }}"></script>
    <script src="{{ asset('js/graficos/rech-horas-lab-admin-cm.js') }}"></script>  --}}

    <!--Graficos-->
    <!-- sweet alert Js -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/alerta_suscripcion.js') }}"></script>
{{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!--select2 -->
    <script src="{{ asset('js/plugins/select2.full.min.js')}}"></script>

    <!-- Tablas -->
    <script src="{{ asset('js/facturacion.js') }}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        function convenio_profesional_cm() {
            $('#convenio_usuario').modal('show');
        }
		function liquidacion_prof_cm() {
            $('#liquidacion').modal('show');
        }
		function liquidacion_profesional() {
            $('#m_remuneraciones').modal('show');
        }

        $(document).ready(function () {
            $('#at_profesionales').DataTable({
                responsive: true,
            });

            console.log('{{ session('titulo_mensaje') }}');
            console.log('{{ session('mensaje') }}');
            {{--  mensaje de al registrar ficha clinica  --}}
            @if(session('mensaje'))
                swal({
                    @if(session('titulo_mensaje'))
                        title: "{{ session('titulo_mensaje') }}",
                    @else
                        title: "Registro de Ficha Clínica.",
                    @endif
                    text:"{{ session('mensaje') }}",
                    icon: "info",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif
            {{--  mensaje de exito al registrar ficha clinica  --}}
            @if(session('success'))
                swal({
                    @if(session('titulo_success'))
                    title: "{{ session('titulo_success') }}",
                    @else
                    title: "Registro de Ficha Clínica.",
                    @endif
                    text:"{{ session('success') }}",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

            {{--  mensaje de erro al registrar ficha clinica  --}}
            @if(session('error'))
                swal({
                    @if(session('titulo_error'))
                    title: "{{ session('titulo_error') }}",
                    @else
                    title: "Registro de Ficha Clínica.",
                    @endif
                    text:"{{ session('error') }}",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

            {{--  mensaje de warning al registrar ficha clinica  --}}
            @if(session('warning'))
                swal({
                    @if(session('titulo_warning'))
                    title: "{{ session('titulo_warning') }}",
                    @else
                    title: "Registro de Ficha Clínica.",
                    @endif
                    text:"{{ session('warning') }}",
                    icon: "warning",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif
        });
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
    </script>

    {{--
    <script>
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                colors: ["#0e9e4a", "#4680ff", "#ff5252"],
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Horas confirmadas',
                    data: [44, 55, 57, 56, 61, 58]
                }, {
                    name: 'Horas canceladas',
                    data: [76, 85, 101, 98, 87, 105]
                }, {
                    name: 'Inasistencia',
                    data: [35, 41, 36, 26, 45, 48]
                }],
                xaxis: {
                    categories: ['Ene','Feb', 'Mar', 'Abr', 'May', 'Jun'],
                },

                fill: {
                    opacity: 1

                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return " " + val + ""
                        }
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#bar-chart-1"),
                options
            );
            chart.render();
        });
    </script>

    <!--Datos de atenciones médicas-->
    <script>
        $(function() {
        var options = {
            chart: {
                height: 320,
                type: 'pie',
            },
            labels: ['Recetas', 'Licencias', 'Exámenes', 'Diagnósticos CIE-10', 'Pacientes Crónicos'],
            series: [103, 55, 89, 45, 22],
            colors: ["#4680ff", "#0e9e4a", "#00acc1", "#ffba57", "#ff5252"],
            legend: {
                show: true,
                position: 'bottom',
            },
            dataLabels: {
                enabled: true,
                dropShadow: {
                    enabled: false,
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        }
        var chart = new ApexCharts(
            document.querySelector("#pie-chart-1"),
            options
        );
        chart.render();
    });
    </script>

    <!--Reclamos / Felicitaciones-->
    <script>
        $(document).ready(function() {
        // [ Support tracker ] start
        $(function() {
            var options = {
                chart: {
                    height: 100,
                    type: 'bar',
                    sparkline: {
                        enabled: true
                    },
                },
                colors: ["#1CBEBE", "#ff5252"],
                plotOptions: {
                    bar: {
                        columnWidth: '70%',
                        distributed: true
                    }
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 0
                },
                series: [{
                    name: 'Total',
                    data: [203, 102,]
                }],
                xaxis: {
                    categories: ['Reclamos', 'Felicitaciones',],
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#chart-percent"),
                options
            );
            chart.render()
        });
        // [ Support tracker ] end
    });
    </script>

    <!--Rechazo de horas-->
    <script>
        $(function() {
            var options = {
                chart: {
                    height: 250,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '30%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                colors: ["#1CBEBE", "#ff5252","#37DEAB","#374FDE","#EA8132","#DE378D"],
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Medicina general',
                    data: [44]
                }, {
                    name: 'Vacunatorio  inmunocomprometidos',
                    data: [76]
                },

                {
                    name: 'Vacunatorio infantil',
                    data: [205]
                },

                {
                    name: 'Vacunatorio adulto',
                    data: [18]
                },

                {
                    name: 'Vacunatorio adulto mayor',
                    data: [55]
                },

                {
                    name: 'Infectología',
                    data: [87]
                },

                ],
                xaxis: {
                    categories: ['Mensual',],
                },

                fill: {
                    opacity: 1

                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return " " + val + ""
                        }
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#rech-horas"),
                options
            );
            chart.render();
        });
    </script>
    --}}
    @yield('page-scripts')
    @yield('js-profesionales')
</body>

</html>
