<!DOCTYPE html>
<html lang="es">

<head>
     <title>SERVICIOS</title>
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
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">
    <!--Estilos escritorios-->
    <link rel="stylesheet" href='{{ asset('css/escritorios.css') }}'/>

    <!--Estilos formularios sm-->
    <link rel="stylesheet" href='{{ asset('css/formulario_sm.css') }}'/>

        <!-- fRANCISCO -->
        <script src="{{ asset('js/compras.js') }}"></script>

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
     <!-- fileupload-custom css -->
     <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">

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

    <script src="{{ asset('js/modals_atencion_dental.js') }}"></script>

    <!--Bs-Canvas-->
    <link rel="stylesheet" href='{{ asset('css/bs_canvas.css') }}'/>
    <style>
        .pcoded-navbar.menu-light.navbar-collapsed{
            display: none;
        }
    </style>
    @yield('style')
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
    {{--  <script src="{{ asset('js/modals_dental.js') }}"></script>  --}}

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
    <script src="{{ asset('js/modals_atencion_medica.js') }}"></script>
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
        <!-- file-upload Js -->
        <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>
        <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

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

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!--select2 -->
    <script src="{{ asset('js/plugins/select2.full.min.js')}}"></script>

    <!-- Tablas -->
    <script src="{{ asset('js/facturacion.js') }}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


        function convenio_profesional_cm(id_profesional,id_lugar_atencion) {
            console.log(id_profesional);

            var url = "{{ route('adm_cm.dame_convenio_profesional') }}";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    _token: CSRF_TOKEN,
                },
            }).done(function(data) {
                console.log(data);
                if (data.estado == 1) {
                    $('#convenio_usuario').modal('show');
                    $('#rut').val(data.rut);
                    $('#cm_prof_cobro').val(data.tipo_cobro);
                    $('#cm_prof_cobro_valor').val(data.valor);
                } else {
                    swal({
                        title: "Error",
                        text: data.msj,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
        }
		function liquidacion_prof_cm() {
            $('#liquidacion').modal('show');
        }
		function liquidacion_profesional() {
            $('#m_remuneraciones').modal('show');
        }



        function buscar_ciudad(id_ciudad=0) {

            let region = $('#region_agregar').val();
            let url = "{{ route('buscar_ciudad_region') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            }).done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_agregar');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if(id_ciudad != 0)
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

        function buscar_ciudad_editar(id_ciudad=0){
            return new Promise((resolve, reject) => {
                let region = $('#region_editar').val();
                let url = "{{ route('buscar_ciudad_region') }}";
                $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        region: region,
                    },
                }).done(function(data) {
                    console.log(data);
                    if (data != null) {
                        data = JSON.parse(data);

                        let ciudades = $('#comunas_editar');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if(id_ciudad != 0)
                            ciudades.val(id_ciudad);

                        resolve(); // Resuelve la promesa cuando se ha terminado de cargar las ciudades
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar las ciudades",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        reject(); // Rechaza la promesa si hay un error
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                    reject(); // Rechaza la promesa si hay un error
                });
            });
        }

        $(document).ready(function () {

            $('.loader-bg').hide();

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

        function finalizar_atencion(nombre) {
    swal({
        title: "¿Está seguro de finalizar la atención de " + nombre + " ?",
        text: "Una vez finalizada la atención no podrá realizar cambios",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            swal({
                title: "Destino del paciente",
                text: "Escribe el destino del paciente:",
                content: "input", // Esto permite que el swal tenga un input de texto
                button: {
                    text: "Confirmar",
                    closeModal: false,
                },
            })
            .then((destino) => {
                if (!destino) throw null; // Si no se ingresa un destino, no hacer nada
                // Aquí puedes llamar a tu función AJAX, pasando el destino como parámetro
                finalizar_atencion_ajax(destino);
            })
            .catch(err => {
                if (err) {
                    swal("Oh no!", "Ha ocurrido un error al procesar tu solicitud.", "error");
                } else {
                    swal.stopLoading();
                    swal.close();
                }
            });
        }
    });
}

function finalizar_atencion_ajax(destino){
        console.log(destino);
       let id_paciente = dame_id_paciente();
         $.ajax({
                url: "{{ route('profesional.finalizar_atencion') }}",
                type: 'POST',
                data: {
                 _token: "{{ csrf_token() }}",
                 id_paciente: id_paciente,
                destino: destino
                },
                success: function(response){
                    console.log(response);
                 if(response == 'OK'){
                      swal("Atención finalizada", {
                            icon: "success",
                      }).then((value) => {
                        console.log('finalizar_atencion_ajax');
                      });
                 }else{
                      swal("Error", "No se pudo finalizar la atención", "error");
                 }
                },
                error: function(){
                 swal("Error", "No se pudo finalizar la atención", "error");
                }
          });
    }

    function formatoRut(rut)
        {
            var valor = rut.value.replace('.','');
            valor = valor.replace(/\-/g,'');

            cuerpo = valor.slice(0,-1);
            dv = valor.slice(-1).toUpperCase();
            rut.value = cuerpo + '-'+ dv

            if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

            suma = 0;
            multiplo = 2;

            for(i=1;i<=cuerpo.length;i++)
            {
                index = multiplo * valor.charAt(cuerpo.length - i);
                suma = suma + index;
                if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
            }

            dvEsperado = 11 - (suma % 11);
            dv = (dv == 'K')?10:dv;
            dv = (dv == 0)?11:dv;

            if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

            rut.setCustomValidity('');
        }

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
                    }
                    else
                    {
                        swal({
                            title: "Informacion del Profesional no encontrada",
                            icon: "error",
                            buttons: "Aceptar",
                        })
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            $('#info_profesional').modal('show');
        }

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
    @yield('page-script')
    @yield('js-profesionales')
</body>

</html>
