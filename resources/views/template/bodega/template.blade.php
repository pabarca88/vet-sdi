<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bodega</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('/css/escritorio_profesional.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('/css/buscador.css') }}?t={{ time() }}">
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('/css/plugins/dataTables.bootstrap4.min.css') }}?t={{ time() }}">




    <link rel="stylesheet" href="{{ asset('/css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/escritorio_laboratorio.css') }}?t={{ time() }}">
    <!-- Rating css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/bars-1to10.css') }}'/>

    <link rel="stylesheet" href='{{ asset('css/boton-flotante.css') }}'/>
    <!--Estilos base-->
    <link rel="stylesheet" href='{{ asset('css/style.css') }}'/>
    <!--Estilos escritorios-->
    <link rel="stylesheet" href='{{ asset('css/escritorios.css') }}'/>
    <!--Estilos formularios sm-->
    <link rel="stylesheet" href='{{ asset('css/formulario_sm.css') }}'/>
    <!-- data tables css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}'/>
    <link rel="stylesheet" href='{{ asset('css/plugins/responsive.bootstrap4.min.css') }}'/>
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

    @include('template.enfermera_tens.menu')
    @include('template.enfermera_tens.header')


    @yield('content')

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>


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
{{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!--Gráficos-->
    {{--  <script src="{{ asset('js/graficos/sf-prof-admin-cm.js') }}"></script>
    <script src="{{ asset('js/graficos/rech-horas-prof-admin-cm.js') }}"></script>  --}}

    <script src="{{ asset('js/graficos/sf-lab-admin-cm.js') }}"></script>
    <script src="{{ asset('js/graficos/rech-horas-lab-admin-cm.js') }}"></script>

    <!--Graficos-->
    <!-- sweet alert Js -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/alerta_suscripcion.js') }}"></script>
     <!-- Tablas -->
    <script src="{{ asset('js/facturacion.js') }}"></script>
	<script>
        function cuenta_corriente() {
            $('#dat_bancarios').modal('show');
        }
        function rol_profesional_cm() {
            $('#rol_permisos_profesional_cm').modal('show');
        }
        function horario_profesional_cm() {
            $('#horario_usuario').modal('show');
        }
        function convenio_profesional_cm() {
            $('#convenio_usuario').modal('show');
        }

    </script>

<script>
        var RegionesYcomunas = {

                "regiones": [{
                        "NombreRegion": "Arica y Parinacota",
                        "comunas": ["Arica", "Camarones", "Putre", "General Lagos"]
                },
                    {
                        "NombreRegion": "Tarapacá",
                        "comunas": ["Iquique", "Alto Hospicio", "Pozo Almonte", "Camiña", "Colchane", "Huara", "Pica"]
                },
                    {
                        "NombreRegion": "Antofagasta",
                        "comunas": ["Antofagasta", "Mejillones", "Sierra Gorda", "Taltal", "Calama", "Ollagüe", "San Pedro de Atacama", "Tocopilla", "María Elena"]
                },
                    {
                        "NombreRegion": "Atacama",
                        "comunas": ["Copiapó", "Caldera", "Tierra Amarilla", "Chañaral", "Diego de Almagro", "Vallenar", "Alto del Carmen", "Freirina", "Huasco"]
                },
                    {
                        "NombreRegion": "Coquimbo",
                        "comunas": ["La Serena", "Coquimbo", "Andacollo", "La Higuera", "Paihuano", "Vicuña", "Illapel", "Canela", "Los Vilos", "Salamanca", "Ovalle", "Combarbalá", "Monte Patria", "Punitaqui", "Río Hurtado"]
                },
                    {
                        "NombreRegion": "Valparaíso",
                        "comunas": ["Valparaíso", "Casablanca", "Concón", "Juan Fernández", "Puchuncaví", "Quintero", "Viña del Mar", "Isla de Pascua", "Los Andes", "Calle Larga", "Rinconada", "San Esteban", "La Ligua", "Cabildo", "Papudo", "Petorca", "Zapallar", "Quillota", "Calera", "Hijuelas", "La Cruz", "Nogales", "San Antonio", "Algarrobo", "Cartagena", "El Quisco", "El Tabo", "Santo Domingo", "San Felipe", "Catemu", "Llaillay", "Panquehue", "Putaendo", "Santa María", "Quilpué", "Limache", "Olmué", "Villa Alemana"]
                },
                    {
                        "NombreRegion": "Región del Libertador Gral. Bernardo O’Higgins",
                        "comunas": ["Rancagua", "Codegua", "Coinco", "Coltauco", "Doñihue", "Graneros", "Las Cabras", "Machalí", "Malloa", "Mostazal", "Olivar", "Peumo", "Pichidegua", "Quinta de Tilcoco", "Rengo", "Requínoa", "San Vicente", "Pichilemu", "La Estrella", "Litueche", "Marchihue", "Navidad", "Paredones", "San Fernando", "Chépica", "Chimbarongo", "Lolol", "Nancagua", "Palmilla", "Peralillo", "Placilla", "Pumanque", "Santa Cruz"]
                },
                    {
                        "NombreRegion": "Región del Maule",
                        "comunas": ["Talca", "ConsVtución", "Curepto", "Empedrado", "Maule", "Pelarco", "Pencahue", "Río Claro", "San Clemente", "San Rafael", "Cauquenes", "Chanco", "Pelluhue", "Curicó", "Hualañé", "Licantén", "Molina", "Rauco", "Romeral", "Sagrada Familia", "Teno", "Vichuquén", "Linares", "Colbún", "Longaví", "Parral", "ReVro", "San Javier", "Villa Alegre", "Yerbas Buenas"]
                },
                {
                        "NombreRegion": "Región de Ñuble",
                        "comunas": ["Bulnes", "Chillán", "Chillán Viejo", "Cobquecura", "Coelemu", "Coihueco", "El Carmen", "Ninhue", "Ñiquén", "Pemuco", "Pinto", "Portezuelo", "Quillón", "Quirihue", "Ránquil", "San Carlos", "San Fabián", "San Ignacio", "San Nicolás", "Trehuaco", "Yungay"]
                },

                    {
                        "NombreRegion": "Región del Biobío",
                        "comunas": ["Concepción", "Coronel", "Chiguayante", "Florida", "Hualqui", "Lota", "Penco", "San Pedro de la Paz", "Santa Juana", "Talcahuano", "Tomé", "Hualpén", "Lebu", "Arauco", "Cañete", "Contulmo", "Curanilahue", "Los Álamos", "Tirúa", "Los Ángeles", "Antuco", "Cabrero", "Laja", "Mulchén", "Nacimiento", "Negrete", "Quilaco", "Quilleco", "San Rosendo", "Santa Bárbara", "Tucapel", "Yumbel", "Alto Biobío", "Chillán", "Bulnes", "Cobquecura", "Coelemu", "Coihueco", "Chillán Viejo", "El Carmen", "Ninhue", "Ñiquén", "Pemuco", "Pinto", "Portezuelo", "Quillón", "Quirihue", "Ránquil", "San Carlos", "San Fabián", "San Ignacio", "San Nicolás", "Treguaco", "Yungay"]
                },
                    {
                        "NombreRegion": "Región de la Araucanía",
                        "comunas": ["Temuco", "Carahue", "Cunco", "Curarrehue", "Freire", "Galvarino", "Gorbea", "Lautaro", "Loncoche", "Melipeuco", "Nueva Imperial", "Padre las Casas", "Perquenco", "Pitrufquén", "Pucón", "Saavedra", "Teodoro Schmidt", "Toltén", "Vilcún", "Villarrica", "Cholchol", "Angol", "Collipulli", "Curacautín", "Ercilla", "Lonquimay", "Los Sauces", "Lumaco", "Purén", "Renaico", "Traiguén", "Victoria", ]
                },
                    {
                        "NombreRegion": "Región de Los Ríos",
                        "comunas": ["Valdivia", "Corral", "Lanco", "Los Lagos", "Máfil", "Mariquina", "Paillaco", "Panguipulli", "La Unión", "Futrono", "Lago Ranco", "Río Bueno"]
                },
                    {
                        "NombreRegion": "Región de Los Lagos",
                        "comunas": ["Puerto Montt", "Calbuco", "Cochamó", "Fresia", "FruVllar", "Los Muermos", "Llanquihue", "Maullín", "Puerto Varas", "Castro", "Ancud", "Chonchi", "Curaco de Vélez", "Dalcahue", "Puqueldón", "Queilén", "Quellón", "Quemchi", "Quinchao", "Osorno", "Puerto Octay", "Purranque", "Puyehue", "Río Negro", "San Juan de la Costa", "San Pablo", "Chaitén", "Futaleufú", "Hualaihué", "Palena"]
                },
                    {
                        "NombreRegion": "Región Aisén del Gral. Carlos Ibáñez del Campo",
                        "comunas": ["Coihaique", "Lago Verde", "Aisén", "Cisnes", "Guaitecas", "Cochrane", "O’Higgins", "Tortel", "Chile Chico", "Río Ibáñez"]
                },
                    {
                        "NombreRegion": "Región de Magallanes y de la AntárVca Chilena",
                        "comunas": ["Punta Arenas", "Laguna Blanca", "Río Verde", "San Gregorio", "Cabo de Hornos (Ex Navarino)", "AntárVca", "Porvenir", "Primavera", "Timaukel", "Natales", "Torres del Paine"]
                },
                    {
                        "NombreRegion": "Región Metropolitana de Santiago",
                        "comunas": ["Cerrillos", "Cerro Navia", "Conchalí", "El Bosque", "Estación Central", "Huechuraba", "Independencia", "La Cisterna", "La Florida", "La Granja", "La Pintana", "La Reina", "Las Condes", "Lo Barnechea", "Lo Espejo", "Lo Prado", "Macul", "Maipú", "Ñuñoa", "Pedro Aguirre Cerda", "Peñalolén", "Providencia", "Pudahuel", "Quilicura", "Quinta Normal", "Recoleta", "Renca", "San Joaquín", "San Miguel", "San Ramón", "Vitacura", "Puente Alto", "Pirque", "San José de Maipo", "Colina", "Lampa", "TilVl", "San Bernardo", "Buin", "Calera de Tango", "Paine", "Melipilla", "Alhué", "Curacaví", "María Pinto", "San Pedro", "Talagante", "El Monte", "Isla de Maipo", "Padre Hurtado", "Peñaflor"]
                }]
            }


            jQuery(document).ready(function () {

            var iRegion = 0;
            var htmlRegion = '<option value="sin-region">Seleccione región</option><option value="sin-region"></option>';
            var htmlComunas = '<option value="sin-region">Seleccione comuna</option><option value="sin-region"></option>';

            jQuery.each(RegionesYcomunas.regiones, function () {
                htmlRegion = htmlRegion + '<option value="' + RegionesYcomunas.regiones[iRegion].NombreRegion + '">' + RegionesYcomunas.regiones[iRegion].NombreRegion + '</option>';
                iRegion++;
            });

            jQuery('#regiones').html(htmlRegion);
            jQuery('#comunas').html(htmlComunas);

            jQuery('#regiones').change(function () {
                var iRegiones = 0;
                var valorRegion = jQuery(this).val();
                var htmlComuna = '<option value="sin-comuna">Seleccione comuna</option><option value="sin-comuna">--</option>';
                jQuery.each(RegionesYcomunas.regiones, function () {
                    if (RegionesYcomunas.regiones[iRegiones].NombreRegion == valorRegion) {
                        var iComunas = 0;
                        jQuery.each(RegionesYcomunas.regiones[iRegiones].comunas, function () {
                            htmlComuna = htmlComuna + '<option value="' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '">' + RegionesYcomunas.regiones[iRegiones].comunas[iComunas] + '</option>';
                            iComunas++;
                        });
                    }
                    iRegiones++;
                });
                jQuery('#comunas').html(htmlComuna);
            });
            jQuery('#comunas').change(function () {
                if (jQuery(this).val() == 'sin-region') {
                    alert('selecciones Región');
                } else if (jQuery(this).val() == 'sin-comuna') {
                    alert('selecciones Comuna');
                }
            });
            jQuery('#regiones').change(function () {
                if (jQuery(this).val() == 'sin-region') {
                    alert('selecciones Región');
                }
            });

         });
	</script>
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
    @yield('page-script')
</body>

</html>
