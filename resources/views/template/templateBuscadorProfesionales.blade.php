<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDI | Buscador de Profesionales</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI | Buscador de Profesionales" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"> </script>

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_asistente.css') }}?t={{ time() }} /">
    <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}">

    <link rel="stylesheet" href="{{ asset('css/plugins/ekko-lightbox.css') }}"/>
	<link rel="stylesheet" href="{{ asset('css/plugins/lightbox.min.css') }}"/>

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/pills_modals.css') }}"/>

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />


    <link rel="stylesheet" href="{{ asset('js/fullcalendar-5.10.1/lib/main.css') }}" />

    <!-- select2 -->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/plugins/select2.min.css') }}'/>


   {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>



    @yield('page-styles')

    <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">

    <style>

        #calendario_reserva_buscador {
            {{--  max-width: 900px;  --}}
            max-height: 488px;
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
        .fc .fc-toolbar.fc-header-toolbar {
            margin: 0px;
        }
        .fc .fc-toolbar-title {
            font-size: 1.0em;
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

    @if(Auth::user()->hasRole('Asistente'))
        @include('template.asistente.menu')
        @include('template.asistente.header')
    @elseif(Auth::user()->hasRole('Institucion'))
        @include('template.administracion.menu')
        @include('template.administracion.header')
    @elseif(Auth::user()->hasRole('Servicio'))
        @include('template.administracion.menu')
        @include('template.administracion.header')
    @elseif(Auth::user()->hasRole('Paciente'))
        @if(isset($id_dependiente_activo))
            @include('template.paciente_dependiente.menu')
            @include('template.paciente_dependiente.header')
        @else
            @include('template.paciente.menu')
            @include('template.paciente.header')
        @endif
    @endif



    @yield('content')

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

    <!-- fancy box -->
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!-- momnent -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--full calendar 5-->
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/main.js') }}'></script>
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/locales/es.js') }}'></script>

    <!-- autocomplete -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!--select2 -->
    <script src="{{ asset('js/plugins/select2.full.min.js')}}"></script>

    <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>

    <!-- TEMPLATE BUSCADOR DE PROFESIONAL -->
    <script>

        /*-Buscador profesional-*/
        /*-Ficha profesional-*/
        function f_profesional (id_profesional)
        {
            let url = "{{ route('profesional.informacionProfesional') }}";
            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_profesional: id_profesional,
                    },
            })
            .done(function(data) {
                {{--  console.log(data);  --}}
                if (data.estado == 1) {
                    $('#modal_info_pro_foto').attr('src',data.profesional.img_profesional );
                    $('#modal_info_pro_nombre').html(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                    $('#modal_info_pro_tipo_especialidad').html(data.profesional.tipo_especialidad.nombre);
                    if(data.profesional.id_sub_tipo_especialidad != 0)
                        $('#modalinfo_pro_sub_tipo_especialidad').html(': '+data.profesional.sub_tipo_especialidad.nombre);
                    else
                        $('#modalinfo_pro_sub_tipo_especialidad').html('');


                    $('#modal_info_pro_academicos').html('');
                    $(data.profesional.antecedente_academico).each(function(index, value){
                        var html_academicos ='';
                        html_academicos += '    <div class="col-md-3" align="left">'+value.tipo_antecedente_academico.nombre+'</div>';
                        html_academicos += '    <div class="col-md-4"><b>'+value.nombre+'</b></div>';
                        html_academicos += '    <div class="col-md-5"><b>'+value.ciudad_pais+' '+value.universidad+'</b>'+value.anio+'</div>';
                        $('#modal_info_pro_academicos').append(html_academicos);
                    });

                    $('#modal_info_pro_lugar_atencion').dataTable().fnClearTable();
                    $('#modal_info_pro_lugar_atencion').dataTable().fnDestroy();

                    $('#modal_info_pro_lugar_atencion tbody').html('');
                    $.each(data.lugares_atencion,function(index, value){
                        {{--  console.log($(value.convenio).length);  --}}

                        var html_Lugares_atencion = '';
                        html_Lugares_atencion += '<tr>';
                        html_Lugares_atencion += '    <td><span><strong>'+value.nombre+':</strong></span><br> '+value.direccion.direccion+' #'+value.direccion.numero_dir+', '+value.direccion.ciudad.nombre+'</td>';
                        if(value.convenio == '')
                            html_Lugares_atencion += '    <td style="color:#666666;text-align:left">No informado</td>';
                        else
                            html_Lugares_atencion += '    <td style="color:#666666;text-align:left">'+value.convenio.convenios+'</td>';
                        html_Lugares_atencion += '    <td style="text-align:left">'+value.telefono+'</td>';
                        html_Lugares_atencion += '</tr>';



                        $('#modal_info_pro_lugar_atencion tbody').append(html_Lugares_atencion);
                    });

                    $('#modal_info_pro_lugar_atencion').DataTable({
                        responsive: true,
                    });
                    $('#ficha_profesional').modal('show');

                } else {
                    swal({
                        title: "Informacion del Profesional",
                        text: 'Problema al cargar Informacion del Profesional.',
                        icon: "error",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        /*-Agendar hora medica-*/
        function hora_medica (id_profesional, id_lugar_atencion, tipo_agenda){

            $('#modal_reserva_hora_lugar_atencion').val('');
            $('#modal_reserva_dias_atencion').val('');
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_hora_lista_horas').html('');
            // asigno id profesioanl
            $('#modal_reserva_hora_id_profesional').val(id_profesional);
            $('#modal_reserva_hora_tipo_agenda').val(tipo_agenda);

            carga_calendario_profesional();

            // cargo lugares de atencion  y asigno lugar con hora mas proxima
            lugar_atencion_profesional($('#modal_reserva_hora_id_profesional'), 'modal_reserva_hora_lugar_atencion', id_lugar_atencion)
            $('#reservar_hora').modal('show');
        }

        function buscar_ciudad(element)
        {

            let region = $(element).val();

            let url = "{{ route('home.buscar_ciudad_region') }}";
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
                        {{--  console.log(data);  --}}
                        let ciudades = $('#buscar_especialidad_comuna');
                        let ciudades_prof = $('#buscar_profesional_comuna');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                        ciudades_prof.find('option').remove();
                        ciudades_prof.append('<option value="">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades_prof.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function buscar_tipo_especialidad(element)
        {

            let tipo_especialidad_registro_1 = $('#buscar_especialidad_especialidad');
            tipo_especialidad_registro_1.find('option').remove();
            let tipo_especialidad_registro_2 = $('#buscar_profesional_especialidad');
            tipo_especialidad_registro_2.find('option').remove();
            let tipo_especialidad_registro_3 = $('#buscar_videoconsulta_especialidad');
            tipo_especialidad_registro_3.find('option').remove();

            let sub_tipo_especialidad_registro_1 = $('#buscar_especialidad_subespec');
            sub_tipo_especialidad_registro_1.find('option').remove();
            let sub_tipo_especialidad_registro_2 = $('#buscar_profesional_subespec');
            sub_tipo_especialidad_registro_2.find('option').remove();
            let sub_tipo_especialidad_registro_3 = $('#buscar_videoconsulta_subespec');
            sub_tipo_especialidad_registro_3.find('option').remove();

            let especialidad = $(element).val();

            let url = "{{ route('home.buscar_especialidad') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    especialidad: especialidad,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    {{--  console.log(data);  --}}
                    let especialidades_1 = $('#buscar_especialidad_especialidad');
                    let especialidades_2 = $('#buscar_profesional_especialidad');
                    let especialidades_3 = $('#buscar_videoconsulta_especialidad');

                    especialidades_1.find('option').remove();
                    especialidades_1.append('<option value="">Seleccione</option>');
                    especialidades_2.find('option').remove();
                    especialidades_2.append('<option value="">Seleccione</option>');
                    especialidades_3.find('option').remove();
                    especialidades_3.append('<option value="">Seleccione</option>');
                    if(data.length > 0)
                    {
                        $(data).each(function(i, v) { // indice, valor
                            especialidades_1.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                            especialidades_2.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                            especialidades_3.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    }
                    else
                    {
                        especialidades_1.append('<option value="0">No Aplica</option>');
                        especialidades_1.val(0);
                        especialidades_2.append('<option value="0">No Aplica</option>');
                        especialidades_2.val(0);
                        especialidades_3.append('<option value="0">No Aplica</option>');
                        especialidades_3.val(0);

                        let sub_especialidades_1 = $('#buscar_especialidad_subespec');
                        sub_especialidades_1.append('<option value="0">No Aplica</option>');
                        sub_especialidades_1.val(0);
                        let sub_especialidades_2 = $('#buscar_profesional_subespec');
                        sub_especialidades_2.append('<option value="0">No Aplica</option>');
                        sub_especialidades_2.val(0);
                        let sub_especialidades_3 = $('#buscar_videoconsulta_subespec');
                        sub_especialidades_3.append('<option value="0">No Aplica</option>');
                        sub_especialidades_3.val(0);
                    }


                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function buscar_sub_tipo_especialidad(element)
        {
            let sub_tipo_especialidad_registro_1 = $('#buscar_especialidad_subespec');
            sub_tipo_especialidad_registro_1.find('option').remove();
            let sub_tipo_especialidad_registro_2 = $('#buscar_profesional_subespec');
            sub_tipo_especialidad_registro_2.find('option').remove();
            let sub_tipo_especialidad_registro_3 = $('#buscar_videoconsulta_subespec');
            sub_tipo_especialidad_registro_3.find('option').remove();


            let especialidad = $(element).val();

            let url = "{{ route('home.buscar_sub_tipo_especialidad') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    especialidad: especialidad,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    {{--  console.log(data);  --}}
                    {{--  console.log(data.length);  --}}
                    let sub_especialidades_1 = $('#buscar_especialidad_subespec');
                    let sub_especialidades_2 = $('#buscar_profesional_subespec');
                    let sub_especialidades_3 = $('#buscar_videoconsulta_subespec');

                    sub_especialidades_1.find('option').remove();
                    sub_especialidades_1.append('<option value="">Seleccione</option>');
                    sub_especialidades_2.find('option').remove();
                    sub_especialidades_2.append('<option value="">Seleccione</option>');
                    sub_especialidades_3.find('option').remove();
                    sub_especialidades_3.append('<option value="">Seleccione</option>');
                    if(data.length > 0)
                    {
                        $(data).each(function(i, v) { // indice, valor
                            sub_especialidades_1.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                            sub_especialidades_2.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                            sub_especialidades_3.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    }
                    else
                    {
                        sub_especialidades_1.append('<option value="0">No Aplica</option>');
                        sub_especialidades_1.val(0);
                        sub_especialidades_2.append('<option value="0">No Aplica</option>');
                        sub_especialidades_2.val(0);
                        sub_especialidades_3.append('<option value="0">No Aplica</option>');
                        sub_especialidades_3.val(0);
                    }


                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function buscar_profesional_especialidad()
        {
            var requerido = 0;
            var error = '';

            let buscar_especialidad_profesion = $('#buscar_especialidad_profesion').val();
            let buscar_especialidad_especialidad = $('#buscar_especialidad_especialidad').val();
            let buscar_especialidad_subespec = $('#buscar_especialidad_subespec').val();
            let buscar_especialidad_region = $('#buscar_especialidad_region').val();
            let buscar_especialidad_comuna = $('#buscar_especialidad_comuna').val();
            let buscar_especialidad_hora24 = 0;
            if($('#buscar_especialidad_hora24').prop('checked'))
                buscar_especialidad_hora24 = 1;

            if(buscar_especialidad_profesion == '') {
                requerido = 1;
                error += 'Campo requerido Profesión\n';
            }
            if(buscar_especialidad_especialidad == '') {
                requerido = 1;
                error += 'Campo requerido Especialidad\n';
            }

            if(requerido == 0)
            {

                let url = "{{ route('profesional.buscador') }}";
                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            id_especialidad : buscar_especialidad_profesion,
                            id_tipo_especialidad : buscar_especialidad_especialidad,
                            id_sub_tipo_especialidad : buscar_especialidad_subespec,
                            id_region : buscar_especialidad_region,
                            id_ciudad : buscar_especialidad_comuna,
                            buscar_especialidad_hora24 : buscar_especialidad_hora24,
                            // 1 -> Atención General
                            // 2 -> Atención Dental
                            // 3 -> Atención Telemedicina
                            // 4 -> Examene
                            tipo_agenda : '1,2'

                        },
                    })
                    .done(function(data) {
                        {{--  console.log(data);  --}}
                        if (data.estado == 1)
                        {
                            $('#div_resultado_busqueda').html('');
                            $(data.registros).each(function(key_registro, value_registro) {
                                {{--  console.log(value_registro);  --}}
                                var html = '';
                                html += '<div class="col-sm-12 col-md-4">';
                                html += '    <div class="card user-card user-card-1 mt-4">';
                                html += '        <div class="card-body pt-0">';
                                html += '            <div class="user-about-block text-center">';
                                html += '                <div class="row align-items-end">';
                                html += '                    <div class="col"><img class="img-radius img-fluid wid-70" src="'+value_registro.img_profesional+'" alt="'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'"></div>';
                                html += '                </div>';
                                html += '            </div>';
                                html += '            <div class="text-center">';
                                html += '                <a href="#!" data-toggle="modal" data-target="#modal-report">';
                                html += '                    <span class="badge badge-primary mt-2">';
                                {{--  html +=                         value_registro.especialidades_nombre;  --}}
                                if(value_registro.tipos_especialidad_nombre != null)
                                    html +=                         value_registro.tipos_especialidad_nombre+'<br>';
                                if(value_registro.sub_tipo_especialidad_nombre != null)
                                    html +=                         value_registro.sub_tipo_especialidad_nombre;
                                html += '                    </span>';
                                html += '                    <h6 class="mb-1 mt-2">'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'</h6>';
                                html += '                </a>';

                                if($(value_registro.profesional_hora_mas_proxima).length > 0)
                                    html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora '+value_registro.profesional_hora_mas_proxima['dia']+' '+value_registro.profesional_hora_mas_proxima['hora']+'</p>';
                                else
                                    html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora Sin Agenda</p>';

                                html += '                <button type="button" class="btn btn-outline-info btn-sm" onclick="f_profesional('+value_registro.profesionales_id+');"><i class="feather icon-file-plus"></i> Ver ficha</button>';
                                html += '                <button type="button" class="btn btn-info btn-sm" onclick="hora_medica('+value_registro.profesionales_id+','+value_registro.profesional_hora_mas_proxima.id_lugar_atencion+', \'1,2\');"><i class="feather icon-calendar"></i> Reservar hora</button>';
                                html += '            </div>';
                                html += '        </div>';
                                html += '    </div>';
                                html += '</div>';
                                $('#div_resultado_busqueda').append(html);
                            });

                            {{--  console.log(data);  --}}
                        } else {
                            $('#div_resultado_busqueda').html('<h2>Sin registros</h2>');
                            {{--  console.log(data);  --}}
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }
            else
            {
                swal({
                    title: "Busqueda por especialidad, campos Minimos Requeridos",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        }

        function buscar_profesional_profesional()
        {
            var requerido = 0;
            var error = '';

            let buscar_profesional_profesional = $('#buscar_profesional_dato_profesional').val();
            let buscar_especialidad_profesion = '';
            let buscar_especialidad_especialidad = '';
            let buscar_especialidad_subespec = '';
            let buscar_profesional_region = $('#buscar_profesional_region').val();
            let buscar_profesional_comuna = $('#buscar_profesional_comuna').val();
            let buscar_especialidad_hora24 = 0;
            if($('#buscar_profesional_hora24').prop('checked'))
                buscar_especialidad_hora24 = 1;

            if(buscar_profesional_profesional == '') {
                requerido = 1;
                error += 'Campo requerido Profesional\n';
            }


            if(requerido == 0)
            {

                let url = "{{ route('profesional.buscador') }}";
                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            id_especialidad : buscar_especialidad_profesion,
                            id_tipo_especialidad : buscar_especialidad_especialidad,
                            id_sub_tipo_especialidad : buscar_especialidad_subespec,
                            id_region : buscar_profesional_region,
                            id_ciudad : buscar_profesional_comuna,
                            buscar_especialidad_hora24 : buscar_especialidad_hora24,
                            nombre_rut : buscar_profesional_profesional,
                            // 1 -> Atención General
                            // 2 -> Atención Dental
                            // 3 -> Atención Telemedicina
                            // 4 -> Examene
                            tipo_agenda : '1,2'

                        },
                    })
                    .done(function(data) {
                        {{--  console.log(data);  --}}
                        if (data.estado == 1)
                        {
                            $('#div_resultado_busqueda').html('');
                            $(data.registros).each(function(key_registro, value_registro) {
                                {{--  console.log(value_registro);  --}}
                                var html = '';
                                html += '<div class="col-sm-12 col-md-4">';
                                html += '    <div class="card user-card user-card-1 mt-4">';
                                html += '        <div class="card-body pt-0">';
                                html += '            <div class="user-about-block text-center">';
                                html += '                <div class="row align-items-end">';
                                html += '                    <div class="col"><img class="img-radius img-fluid wid-70" src="storage/'+value_registro.profesionales_foto_perfil+'" alt="'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'"></div>';
                                html += '                </div>';
                                html += '            </div>';
                                html += '            <div class="text-center">';
                                html += '                <a href="#!" data-toggle="modal" data-target="#modal-report">';
                                html += '                    <span class="badge badge-primary mt-2">';
                                {{--  html +=                         value_registro.especialidades_nombre;  --}}
                                if(value_registro.tipos_especialidad_nombre != null)
                                    html +=                         value_registro.tipos_especialidad_nombre+'<br>';
                                if(value_registro.sub_tipo_especialidad_nombre != null)
                                    html +=                         value_registro.sub_tipo_especialidad_nombre;
                                html += '                    </span>';
                                html += '                    <h6 class="mb-1 mt-2">'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'</h6>';
                                html += '                </a>';

                                if($(value_registro.profesional_hora_mas_proxima).length > 0)
                                    html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora '+value_registro.profesional_hora_mas_proxima['dia']+' '+value_registro.profesional_hora_mas_proxima['hora']+'</p>';
                                else
                                    html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora Sin Agenda</p>';

                                html += '                <button type="button" class="btn btn-outline-info btn-sm" onclick="f_profesional('+value_registro.profesionales_id+');"><i class="feather icon-file-plus"></i> Ver ficha</button>';
                                html += '                <button type="button" class="btn btn-info btn-sm" onclick="hora_medica('+value_registro.profesionales_id+','+value_registro.profesional_hora_mas_proxima.id_lugar_atencion+', \'1,2\');"><i class="feather icon-calendar"></i> Reservar hora</button>';
                                html += '            </div>';
                                html += '        </div>';
                                html += '    </div>';
                                html += '</div>';
                                $('#div_resultado_busqueda').append(html);
                            });

                            {{--  console.log(data);  --}}
                        } else {
                            $('#div_resultado_busqueda').html('<h2>Sin registros</h2>');
                            {{--  console.log(data);  --}}
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }
            else
            {
                swal({
                    title: "Busqueda por especialidad, campos Minimos Requeridos",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        }

        function buscar_profesional_especialidad_video_consulta()
        {
            var requerido = 0;
            var error = '';

            let buscar_videoconsulta_profesion = $('#buscar_videoconsulta_profesion').val();
            let buscar_videoconsulta_especialidad = $('#buscar_videoconsulta_especialidad').val();
            let buscar_videoconsulta_subespec = $('#buscar_videoconsulta_subespec').val();
            let buscar_videoconsulta_region = '';
            let buscar_videoconsulta_comuna = '';
            let buscar_videoconsulta_hora24 = 0;
            if($('#buscar_videoconsulta_hora24').prop('checked'))
                buscar_videoconsulta_hora24 = 1;

            if(buscar_videoconsulta_profesion == '') {
                requerido = 1;
                error += 'Campo requerido Profesión\n';
            }
            if(buscar_videoconsulta_especialidad == '') {
                requerido = 1;
                error += 'Campo requerido Especialidad\n';
            }

            if(requerido == 0)
            {

                let url = "{{ route('profesional.buscador') }}";
                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            id_especialidad : buscar_videoconsulta_profesion,
                            id_tipo_especialidad : buscar_videoconsulta_especialidad,
                            id_sub_tipo_especialidad : buscar_videoconsulta_subespec,
                            id_region : buscar_videoconsulta_region,
                            id_ciudad : buscar_videoconsulta_comuna,
                            buscar_especialidad_hora24 : buscar_videoconsulta_hora24,
                            // 1 -> Atención General
                            // 2 -> Atención Dental
                            // 3 -> Atención Telemedicina
                            // 4 -> Examene
                            tipo_agenda : 3
                        },
                    })
                    .done(function(data) {
                        {{--  console.log(data);  --}}
                        if (data.estado == 1)
                        {
                            $('#div_resultado_busqueda').html('');
                            $(data.registros).each(function(key_registro, value_registro) {
                                {{--  console.log(value_registro);  --}}
                                var html = '';
                                html += '<div class="col-sm-12 col-md-4">';
                                html += '    <div class="card user-card user-card-1 mt-4">';
                                html += '        <div class="card-body pt-0">';
                                html += '            <div class="user-about-block text-center">';
                                html += '                <div class="row align-items-end">';
                                html += '                    <div class="col"><img class="img-radius img-fluid wid-70" src="'+value_registro.img_profesional+'" alt="'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'"></div>';
                                html += '                </div>';
                                html += '            </div>';
                                html += '            <div class="text-center">';
                                html += '                <a href="#!" data-toggle="modal" data-target="#modal-report">';
                                html += '                    <span class="badge badge-primary mt-2">';
                                {{--  html +=                         value_registro.especialidades_nombre;  --}}
                                if(value_registro.tipos_especialidad_nombre != null)
                                    html +=                         value_registro.tipos_especialidad_nombre+'<br>';
                                if(value_registro.sub_tipo_especialidad_nombre != null)
                                    html +=                         value_registro.sub_tipo_especialidad_nombre;
                                html += '                    </span>';
                                html += '                    <h6 class="mb-1 mt-2">'+value_registro.profesionales_nombre+' '+value_registro.profesionales_apellido_uno+' '+value_registro.profesionales_apellido_dos+'</h6>';
                                html += '                </a>';

                                if($(value_registro.profesional_hora_mas_proxima).length > 0)
                                    html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora '+value_registro.profesional_hora_mas_proxima['dia']+' '+value_registro.profesional_hora_mas_proxima['hora']+'</p>';
                                else
                                    html += '                <p class="mb-3 text-muted"><i class="feather icon-calendar"></i>Próxima hora Sin Agenda</p>';

                                html += '                <button type="button" class="btn btn-outline-info btn-sm" onclick="f_profesional('+value_registro.profesionales_id+');"><i class="feather icon-file-plus"></i> Ver ficha</button>';
                                html += '                <button type="button" class="btn btn-info btn-sm" onclick="hora_medica('+value_registro.profesionales_id+','+value_registro.profesional_hora_mas_proxima.id_lugar_atencion+', \'3\');"><i class="feather icon-calendar"></i> Reservar hora</button>';
                                html += '            </div>';
                                html += '        </div>';
                                html += '    </div>';
                                html += '</div>';
                                $('#div_resultado_busqueda').append(html);
                            });

                            {{--  console.log(data);  --}}
                        } else {
                            $('#div_resultado_busqueda').html('<h2>Sin registros</h2>');
                            {{--  console.log(data);  --}}
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }
            else
            {
                swal({
                    title: "Busqueda por especialidad, campos Minimos Requeridos",
                    text: error,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        }

        function lugar_atencion_profesional(element, div_destino, value_init = '')
        {
            let id_profesional = $(element).val();
            let url = "{{ route('profesional.lugaresAtencionProfesionalBuscador') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        {{--  console.log(data);  --}}
                        let input_lugar_atencion = $('#'+div_destino);

                        input_lugar_atencion.find('option').remove();
                        input_lugar_atencion.append('<option value="">Seleccione</option>');
                        $(data.registros).each(function(i, v) { // indice, valor
                            input_lugar_atencion.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                        if(value_init != '')
                        {
                            input_lugar_atencion.val(value_init);
                            carga_calendario_profesional();
                        }

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function carga_calendario_profesional()
        {
            $('#modal_reserva_fecha').val('');
            $('#modal_reserva_fecha').attr('disabled',true);
            $('#modal_reserva_hora_lista_horas').html('');

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let tipo_agenda = $('#modal_reserva_hora_tipo_agenda').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            let url = "{{ route('profesional.DiasLaboralesProfesionaLugarAtencionBuscador') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_profesional: id_profesional,
                        lugar_atencion: id_lugar_atencion,
                        tipo_agenda: tipo_agenda,
                    },
                })
                .done(function(data) {
                    if (data.estado == 1)
                    {
                        {{--  calendario(data.registros.horario_agenda_laboral, data.registros.horario_agenda_no_laboral);  --}}

                        if(data.registros.horario_agenda_laboral != '')
                        {
                            console.log(data);
                            let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
                            var dias_activos = data.registros.horario_agenda_laboral.split(',');
                            var dias_texto = '';
                            var cant = 0;

                            $.each(dias_activos, function(index, value)
                            {
                                if(cant>0)
                                    dias_texto += ' - '+dias[value];
                                else
                                    dias_texto += dias[value];

                                cant++;
                            });

                            $('#modal_reserva_dias_atencion').html(dias_texto);

                            /** calendario */
                            $('#modal_reserva_fecha').attr('disabled',false);

                            $("#modal_reserva_fecha").flatpickr({
                                "disable": [
                                    function(date) {
                                        return !dias_activos.includes(String(date.getDay()));
                                    }
                                ],
                                minDate: "today",
                                maxDate: new Date().fp_incr(60), // 14 days from now
                                locale: {
                                    firstDayOfWeek: 1,
                                    weekdays: {
                                    shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                                    longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                    },
                                    months: {
                                    shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
                                    longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    },
                                },
                            });
                            /** fin calendario */

                        }
                        else
                        {
                            $('#modal_reserva_dias_atencion').html('NO INFORMADOS');
                            $('#modal_reserva_fecha').attr('disabled',true);
                            $('#modal_reserva_fecha_seleccionada').html('');
                        }

                    } else {
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function calendario(dias_laborales, dias_no_laborales)
        {
            {{--  console.log(dias_no_laborales);  --}}
            var date = new Date();
            var yyyy = date.getFullYear().toString();
            var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth() + 1).toString() : (date.getMonth() + 1).toString();
            var dd = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString();


            var calendarEl = document.getElementById('calendario_reserva_buscador');
            var calendarEl = new FullCalendar.Calendar(calendarEl, {
                navLinks: false,
                droppable: false,
                editable: false,
                locale: "es",
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                headerToolbar: {
                    start: 'title',
                    center: 'today',
                    right: 'next'
                },
                businessHours: {
                    daysOfWeek: dias_laborales.split(','), // Monday - Thursday

                },

                weekends: true,
                {{--  nowIndicator: true,  --}}
                {{--  selectable: true,  --}}
                titleFormat: {
                    year: 'numeric',
                    month: 'numeric',
                },
                allDaySlot: false,
                {{--  expandRows: true,  --}}
                slotEventOverlap: false,
                selectConstraint: "businessHours",
                selectOverlap: function(event) {
                    console.log('selectOverlap');
                    console.log(event);
                    return event.rendering === 'background';
                },


                dateClick: function(info) {
                    {{--  console.log('dateClick');  --}}
                    {{--  console.log(info);  --}}
                    {{--  console.log(info.date);  --}}
                    {{--  console.log(info.dateStr);  --}}
                    {{--  console.log(info.jsEvent.path);  --}}

                    var valido = 1;
                    $.each(info.jsEvent.path, function(index, value)
                    {
                        if(value.className == 'fc-non-business')
                        {
                            swal({
                                title: "Toma de Hora",
                                text: "Dia No disponible para toma de Hora",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            valido = 0;
                        }

                    });


                    if(valido == 1)
                    {
                        var fechainicial = new Date();
                        fechainicial = fechainicial.getFullYear()+'-'+(fechainicial.getMonth()+1)+'-'+fechainicial.getDate()

                        if(Date.parse(info.dateStr) > Date.parse(fechainicial))
                        {
                            var dia_seleccionado = info.date;
                            var dia_semana = ( dia_seleccionado.getDay() ).toString();
                            var dias_laborales_array =  dias_laborales.split(',')

                            if( $.inArray(dia_semana,dias_laborales_array) != -1)
                            {
                                console.log('dia valido');
                                cargar_horas_disponibles_calendario_profesion(info.dateStr);
                            }
                            else
                            {
                                swal({
                                    title: "Toma de Hora",
                                    text: "Dia No disponible para toma de Hora",
                                    icon: "error",
                                    buttons: "Aceptar",
                                    DangerMode: true,
                                });
                            }
                        }
                        else
                        {
                            swal({
                                title: "Toma de Hora",
                                text: "No se puede tomar Hora para Dias previos.",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    }

                },
                eventDrop: function(info) {
                    console.log(info);
                    return false;
                },
            });
            calendarEl.render();
        }

        function cargar_horas_disponibles_calendario_profesion(dia)
        {

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            let tipo_agenda = $('#modal_reserva_hora_tipo_agenda').val();
            console.log('cargar_horas_disponibles_calendario_profesion');
            console.log(dia);

            let url = "{{ route('profesional.HorasDisponiblesProfesionalLugarAtencionBuscador') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    dia: dia,
                    tipo_agenda: tipo_agenda,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1) {
                    $('#modal_reserva_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

                    $('#modal_reserva_hora_lista_horas').html('');
                    $.each(data.registros, function(index, value)
                    {
                        var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
                        var html = '';
                        html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
                        html += ''+hr1;
                        html += '</div>';

                        $('#modal_reserva_hora_lista_horas').append(html);
                    });

                } else {
                    // alert('No se pudo Cargar las ciudades');
                    $('#modal_reserva_hora_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function generar_reserva_cita(hora)
        {
            console.log('generar_reserva_cita');
            $('.div_rut_buscar').hide();
            $('#form_reseva_de_horas').hide();
            $('#reserva_datos_paciente').hide();
            $('#reserva_agregar_paciente_hora').hide();

            $('#reservar_hora').modal('hide');

            let id_profesional = $('#modal_reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#modal_reserva_hora_lugar_atencion').val();
            let fecha_consulta = $('#modal_reserva_fecha').val();
            $('#reserva_hora_id_profesional').val('');
            $('#reserva_hora_id_lugar_atencion').val('');
            $('#reserva_hora_fecha_consulta').val('');
            $('#reserva_hora_hora_consulta').val('');

            let url = "{{ route('paciente.get.informacion') }}";
            var datos = {};

            var id_dependiente_activo = '';
            @if (!empty($id_dependiente_activo))
                id_dependiente_activo = '{{ $paciente->id }}';
                $('#seccion_acompanante').show();
            @else
                id_dependiente_activo = '';
                $('#seccion_acompanante').hide();
            @endif

            if(id_dependiente_activo != '')
                datos.id_dependiente_activo = id_dependiente_activo;

            $.ajax({
                url: url,
                type: "get",
                data: datos,
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {

                    $('.div_rut_buscar').hide();
                    $('#form_reseva_de_horas').show();
                    $('#reserva_datos_paciente').show();
                    $('#reserva_agregar_paciente_hora').hide();

                    $('#agenda_agregar_paciente').modal('show');

                    $('#reserva_hora_id_profesional').val(id_profesional);
                    $('#reserva_hora_id_lugar_atencion').val(id_lugar_atencion);
                    $('#reserva_hora_fecha_consulta').val(fecha_consulta);
                    $('#reserva_hora_hora_consulta').val(hora);

                    $('#reserva_hora_id_paciente').val(data.registro.id);

                    $('#reserva_rut_paciente').html(data.registro.rut);
                    $('#reserva_hora_nombre').html(data.registro.nombres + ' ' + data.registro.apellido_uno + ' ' + data.registro.apellido_dos);
                    $('#reserva_fecha_nacimiento').html(data.registro.fecha_nac);
                    if (data.registro.sexo == 'M') {
                        $('#reserva_sexo').text('Masculino');
                    } else {
                        $('#reserva_sexo').text('Femenino');
                    }
                    $('#reserva_convenio').html(data.registro.prevision.nombre);
                    $('#reserva_direccion').html(data.registro.direccion.direccion+' '+data.registro.direccion.numero_dir+', '+data.registro.direccion.ciudad.nombre);
                    $('#reserva_hora_email').html(data.registro.email);
                    $('#reserva_hora_telefono').html(data.registro.telefono_uno);

                    if( data.registro.edad < 18 )
                    {
                        $('#seccion_autorizacion').show();
                    }
                    else
                    {
                        $('#seccion_autorizacion').hide();
                    }

                    if(typeof data.registro.representante != "undefined")
                    {
                        $('#div_info_representante').show();
                        $('#div_info_representante').html('<strong>Representante:</strong> '+data.registro.representante.nombres+' '+data.registro.representante.apellido_uno);

                        $('#div_info_acompanante').hide();
                        $('#reserva_hora_id_acompanante').html('');
                        $.each(data.registro.acompanante, function (indexInArray, valueOfElement)
                        {
                            console.log(valueOfElement);
                            var html = '';
                            html = '<option value="'+valueOfElement.id_acompanante+'">'+valueOfElement.acompanante.nombre+' '+valueOfElement.acompanante.apellido_uno+' - '+valueOfElement.acompanante.rut+'</option>';
                            $('#reserva_hora_id_acompanante').append(html);
                        });
                        $('#reserva_hora_id_acompanante').select2();
                    }
                    else
                    {
                        $('#acompanante_representante').prop("checked", false);
                    }
                }
                else
                {
                    swal({
                        title: "Debe completar los datos de Inscripción",
                        text: error,
                        icon: "error",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        {{--  GENERAR HORA USUARIO EXISTENTE  --}}
        function agendar_hora() {

            let url = "{{ route('paciente.solicitar.hora') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#reserva_hora_fecha_consulta').val()+' '+$('#reserva_hora_hora_consulta').val();
            let reserva_hora_id = $('#reserva_hora_id_paciente').val();
            let id_profesional = $('#reserva_hora_id_profesional').val();
            let id_lugar_atencion = $('#reserva_hora_id_lugar_atencion').val();
            let id_asistente = $('#reserva_hora_id_asistente').val();
            let origen = $('#reserva_hora_origen').val();

            let tipo_agenda = $('#select_tipo_agenda').val();
            var tipo_agenda_text = 'C';

            console.log(tipo_agenda);
            console.log(tipo_agenda_text);

            switch (tipo_agenda) {
                case '1':
                    tipo_agenda_text = 'C';//CONSULTA
                    break;
                case '2':
                    tipo_agenda_text = 'D';//DENTAL
                    break;
                case '3':
                    tipo_agenda_text = 'T';//TELEMEDICINA
                    break;
                case '4':
                    tipo_agenda_text = 'E';//EXAMEN
                    break;
            }

            console.log(tipo_agenda_text);


            let representante = 0;
            let lista_Acompanante = $('#reserva_hora_id_acompanante').val();

            if( $('#acompanante_representante').prop("checked") )
                representante = 1;
            else
                representante = 0;

            let acompanante = 0;
            if( $('#acompanante_acompanante').prop("checked") )
                acompanante = 1;
            else
            {
                acompanante = 0;
                lista_Acompanante = '';
            }

            let autorizacion_atencion = 0;
            if( $('#autorizacion_atencion').prop("checked") )
                autorizacion_atencion = 1;
            else
                autorizacion_atencion = 0;

            $.ajax({
                    url: url,
                    type: "post",
                    data: {
                        _token: _token,
                        fecha_consulta: fecha_consulta,
                        reserva_hora_id: reserva_hora_id,
                        id_lugar_atencion: id_lugar_atencion,
                        id_profesional: id_profesional,
                        id_asistente: id_asistente,
                        origen: origen,
                        representante: representante,
                        acompanante: acompanante,
                        lista_Acompanante: lista_Acompanante,
                        autorizacion_atencion: autorizacion_atencion,
                        tipo_hora_medica: tipo_agenda_text,
                    }
                })
                .done(function(data) {
                    if (data != null) {

                        data = JSON.parse(data);
                        if(data.estado == 'error')
                        {
                            swal({
                                title: "Error!",
                                text: data.msj,
                                icon: "error",
                                type: "error",
                                buttons: "Cerrar",
                            });
                        }
                        else
                        {
                            swal({
                                title: "Hora Agendada Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }
                        $('#agenda_agregar_paciente').modal('hide');

                        $('#reserva_hora_id_profesional').val('');
                        $('#reserva_hora_id_lugar_atencion').val('');
                        $('#reserva_hora_fecha_consulta').val('');
                        $('#reserva_hora_hora_consulta').val('');
                        $('#reserva_hora_id_paciente').val('');
                        $('#reserva_rut_paciente').html('');
                        $('#reserva_hora_nombre').html('');
                        $('#reserva_fecha_nacimiento').html('');
                        $('#reserva_sexo').text('');
                        $('#reserva_convenio').html('');
                        $('#reserva_direccion').html('');
                        $('#reserva_hora_email').html('');
                        $('#reserva_hora_telefono').html('');


                    }
                    else
                    {
                        swal({
                            title: "Error!",
                            text: "Problema en la solicitud de la hora",
                            icon: "error",
                            type: "error",
                            buttons: "Cerrar",
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };


        $(document).ready(function() {
            $('#modal_info_pro_lugar_atencion').DataTable({
                responsive: true,
            })

            $('#acompanante_representante').change(function(elm)
            {
                if(this.checked)
                {
                    $('#div_info_representante').show();
                }
                else
                {
                    $('#div_info_representante').hide();
                }
            });

            $('#acompanante_acompanante').change(function(elm)
            {
                if(this.checked)
                {
                    $('#div_info_acompanante').show();
                }
                else
                {
                    $('#div_info_acompanante').hide();
                    $('#reserva_hora_id_acompanante').val('').select2();
                }
            });
        });




    </script>

    @yield('page-script')


</body>
</html>



