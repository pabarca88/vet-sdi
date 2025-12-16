<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SDI | Asistente</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI | Asistente" />

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

    <link rel="stylesheet" href="{{ asset('css/pills_modals.css') }}"/>

    {{-- estilos de atencion medica --}}
    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}"/>

	{{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('page-styles')
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
    @include('template.asistente.menu')
    @include('template.asistente.header')

    @yield('content')

    @yield('modals')


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

    <!-- momnent -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- autocomplete -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var info_profesional_seleccionado = [];

        $(document).ready(function()
        {
            $('.loader-bg').hide();
            {{--  cargarAgendaProfesional($('#agenda_lugar_atencion_asistente').val(), $('#agenda_profesional_asistente').val());  --}}


            {{--  CERRAR MODALES  --}}
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

            $(".close_modal_recepcion_bonos_api").click(function() {
                $("#modal_recepcion_bonos_api").modal('hide')
            });

            $(".close_agenda_agregar_paciente").click(function() {
                $("#agenda_agregar_paciente").modal('hide');
                $('#rut_paciente_reserva').val('');
            });

            $(".cerrar_modal_info_profesional").click(function() {
                $("#info_profesional").modal('hide');
            });

            function cerrar_modal_infoProf() {
                $('#info_prof').modal('hide');
            }
            {{-- ****** VALIDACIONDEFORMULARIOS ****** --}}
            {{--  VALIDACION RUT BUSQUEDA - AGENDA  --}}
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

            {{--  Tablas rendir caja  --}}
            $('#tabla_rendir_caja').DataTable({
                responsive: true,
            });

        });


        {{--  METODO DANI  --}}
        // [ customer-scroll ] start
        {{--  var px = new PerfectScrollbar('.cust-scroll', {
            wheelSpeed: .5,
            swipeEasing: 0,
            wheelPropagation: 1,
            minScrollbarLength: 40,
        });  --}}
        // [ customer-scroll ] end

        {{--  ***** INICIO FUNCIONES ******  --}}
        /** METODOS DE AGENDA */
        {{-- BUSCAR INFO PROFESIONAL --}}
        function cargarProfesional()
        {
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let url = "{{ route('agenda.buscar_info_profesional') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                },
                success:function(data){
                            if (data !== 'null')
                            {
                                //data = JSON.parse(data);
                                {{--  console.log('-----------------------');  --}}
                                {{--  console.log(data);  --}}
                                {{--  console.log('-----------------------');  --}}
                                if(data.estado == 1)
                                {
                                    info_profesional_seleccionado.push(data.profesional);
                                    info_profesional_seleccionado.push(data.horario);
                                    return true;
                                }
                                else
                                {
                                    swal({
                                        title: "Agenda del Profesional.",
                                        text:"El profesional no cuenta con agenda.",
                                        icon: "error",
                                        // buttons: "Aceptar",
                                        //SuccessMode: true,
                                    });
                                    return false;
                                }
                            }
                            end(arrayTemp);
                        }
            });
        }

        {{--  CARGA AGENDE DEL PROFESIONAL  --}}
        function cargarAgendaProfesional(id_lugar_atencion, id_profesional, fecha)
        {

            var evaluacion = false;

            var id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
            var id_profesional = $('#agenda_profesional_asistente').val();
            let url1 = "{{ route('agenda.buscar_info_profesional') }}";
            $.ajax({
                url: url1,
                type: "GET",
                data: {
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                },
                success:function(data){
                            if (data !== 'null')
                            {
                                //data = JSON.parse(data);
                                {{--  console.log('-----------------------');  --}}
                                {{--  console.log(data);  --}}
                                {{--  console.log('-----------------------');  --}}
                                if(data.estado == 1)
                                {
                                    info_profesional_seleccionado['profesional'] = data.profesional;
                                    info_profesional_seleccionado['horario'] = data.horario;
                                    info_profesional_seleccionado['horario_data'] = data.horario_data;
                                    evaluacion =  true;
                                    {{--  console.log(evaluacion);  --}}
                                    if(evaluacion)
                                    {
                                        var calendarEl = document.getElementById('agenda');
                                        var CalendarEl = new FullCalendar.Calendar(calendarEl, {
                                            droppable: false,
                                            editable: false,
                                            locale: "es",
                                            timeZone: 'local',
                                            initialDate: fecha,
                                            initialView: 'timeGridWeek',
                                            themeSystem: 'bootstrap',
                                            slotDuration: '00:15:00',
                                            // slotMinutes: '00:15:00',
                                            headerToolbar: {
                                                //start: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek', // will normally be on the left. if RTL, will be on the right
                                                //center: 'title',
                                                //end: 'today prev,next'
                                                start: 'prev,next today',
                                                center: 'title',
                                                // right: 'timeGridWeek,listWeek'
                                                right: 'timeGridWeek,listWeek'
                                            },
                                            // timeGrid: 60,
                                            //navLinks: true,
                                            weekends: false,
                                            nowIndicator: true,
                                            selectable: true,
                                            //dayMaxEvents: true,
                                            titleFormat: {
                                                year: 'numeric',
                                                month: 'numeric',
                                                day: 'numeric'
                                            },
                                            allDaySlot: false,
                                            expandRows: true,
                                            slotEventOverlap: false,

                                            selectConstraint: "businessHours",
                                            slotLabelFormat: {
                                                hour: 'numeric',
                                                minute: '2-digit',
                                                omitZeroMinute: false,
                                                meridiem: 'medium'
                                            },
                                            eventDidMount: function(info) {
                                                {{--   console.log(info.el);  --}}
                                                $(info.el).tooltip({
                                                    title: info.event.extendedProps.description,
                                                    placement: "top",
                                                    trigger: "hover",
                                                    container: "body"
                                                });
                                            },

                                            events: function(start, end, callback){
                                                    var arrayTemp = [];
                                                    let url = "{{ route('hora_medica.ver') }}";
                                                    $.ajax({
                                                        url: url,
                                                        type: "GET",
                                                        data: {
                                                            id_profesional: id_profesional,
                                                            id_lugar_atencion: id_lugar_atencion,
                                                        },
                                                        success:function(data){
                                                                    if (data !== 'null')
                                                                    {
                                                                        //data = JSON.parse(data);
                                                                        console.log('-----------------------');
                                                                        console.log(data);
                                                                        console.log('-----------------------');
                                                                        if(data.estado == 1)
                                                                        {
                                                                            // var arraytemp = [];
                                                                            // arraytemp.push([id=>'11']);
                                                                            // console.log(arraytemp)
                                                                            var arrayTemp = [];
                                                                            data.registros.forEach(element => {
                                                                                var rut = element.paciente.rut+' | '
                                                                                var valor = element.estado.valor+' | '
                                                                                var comentarios_confirmacion = '';
                                                                                if(comentarios_confirmacion != 'null')
                                                                                    comentarios_confirmacion = element.comentarios_confirmacion+' | '
                                                                                var nombre = element.paciente.prevision.nombre
                                                                                var descripcion = '';
                                                                                descripcion += rut;
                                                                                descripcion += valor;
                                                                                descripcion += comentarios_confirmacion;
                                                                                descripcion += nombre;

                                                                                arrayTemp.push({
                                                                                                id: element.id,
                                                                                                title: element.descripcion,
                                                                                                {{--  description: '{{ $hm->Paciente->rut }} | {{ $hm->Estado()->first()->valor }} | {{ $hm->comentarios_confirmacion }} | {{ $hm->Paciente->Prevision->nombre }}',  --}}
                                                                                                description: descripcion ,
                                                                                                start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                                                end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                                                backgroundColor: element.estado.color
                                                                                });
                                                                            });
                                                                            console.log(arrayTemp);
                                                                        }
                                                                        else
                                                                        {
                                                                            console.log('falla en carga');
                                                                        }
                                                                    }
                                                                    end(arrayTemp);
                                                                }
                                                    });
                                            },

                                            eventClick: function(info) {
                                                let id_hora_medica = info.event.id;
                                                let url = "{{ route('agenda.buscar_hora_medica') }}"

                                                $.ajax({

                                                        url: url,
                                                        type: "get",
                                                        data: {
                                                            //_token: _token,
                                                            id_hora_medica: id_hora_medica,
                                                        },
                                                    })
                                                    .done(function(data) {
                                                        if (data != null) {
                                                            // limpiamos los examenes si es que hubieran cargados
                                                            $('#m_agendar_hora_examen_lista_examenes').val('');
                                                            {{--  // console.log(info.event);  --}}
                                                            {{--  console.log(data);  --}}
                                                            // data = JSON.parse(data);
                                                            $('#datos_consulta_rut').text(data.paciente.rut);
                                                            $('#datos_consulta_nombre').text(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                            $('#datos_consulta_edad').text(data.paciente.fecha_nac);

                                                            if (data.paciente.sexo == 'M') {
                                                                $('#datos_consulta_sexo').text('Masculino');
                                                            } else {
                                                                $('#datos_consulta_sexo').text('Femenino');
                                                            }

                                                            $('#estado_id_profesional').val(data.profesional.id);
                                                            $('#estado_id_paciente').val(data.paciente.id);
                                                            $('#id_hora_medica').val(id_hora_medica);

                                                            //celeste
                                                            //Reservada
                                                            if (data.estado_hora == 1) //else if (info.event.backgroundColor == '#FEAA32')
                                                            {
                                                                //'Reservada') //Hora pendiente
                                                                $('#hm_anular_hora').show();
                                                                $('#hm_atender_hora').hide();
                                                                $('#hm_confirmar_hora').show();
                                                                $('#hm_ver_hora').hide();
                                                                $('#hm_espera_paciente_hora').hide();
                                                                $('#confirmar_anulacion_hora').hide();
                                                                $('#confirmacion_hora').hide();

                                                                $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                                $('#consulta').modal('show');
                                                                // $('#id_hora_medica').val(id_hora_medica);
                                                                // console.log(data);
                                                                // $('#reservar_hora').modal('hide');
                                                                //location.reload();
                                                            }
                                                            //verde
                                                            // CONFIRMADO
                                                            else if(data.estado_hora == 2)//if (info.event.backgroundColor == '#94BF61')
                                                            {
                                                                //'Confirmada')//Hora confirmada
                                                                // $('#hm_confirmar_hora').hide();
                                                                // $('#hm_anular_hora').show();
                                                                // $('#hm_atender_hora').show();
                                                                // // $('#hm_espera_paciente_hora').show();
                                                                // $('#hm_espera_paciente_hora').hide();
                                                                // $('#hm_ver_hora').hide();
                                                                // $('#confirmar_anulacion_hora').hide();
                                                                // $('#confirmacion_hora').hide();
                                                                $('#modal_recepcion_bonos_api').modal('show');
                                                                $('#bono_paciente_rut').val(data.paciente.rut);
                                                                $('#bono_paciente_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                                $('#bono_profesional_nombre').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                                $('#bono_profesional_rut').val( data.profesional.rut);
                                                                $('#bono_hora_medica').val(info.event.id);
                                                                $('#bono_id_profesional').val(data.profesional.id);
                                                                $('#bono_id_paciente').val(data.paciente.id);

                                                            }
                                                            //rojo
                                                            //Rechazada
                                                            else if(data.estado_hora == 3)//else if (info.event.backgroundColor == '#FF3D3D')
                                                            {
                                                                // 'Rechazada')//Hora cancelada
                                                                $('#hm_anular_hora').hide();
                                                                $('#hm_atender_hora').hide();
                                                                $('#hm_confirmar_hora').hide();
                                                                $('#hm_espera_paciente_hora').hide();
                                                                $('#hm_ver_hora').hide();
                                                                $('#confirmar_anulacion_hora').hide();
                                                                $('#confirmacion_hora').hide();

                                                                $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                                $('#consulta').modal('show');
                                                                // $('#id_hora_medica').val(id_hora_medica);
                                                                // console.log(data);
                                                                // $('#reservar_hora').modal('hide');
                                                                //location.reload();
                                                            }
                                                            //morado
                                                            // Espera -- Llamando
                                                            else if (data.estado_hora == 4 || data.estado_hora == 8) //else if (info.event.backgroundColor == '#A06CC1')
                                                            {
                                                                // 'Espera')//Esperando atención
                                                                // 'Llamando')//Esperando atención
                                                                $('#hm_anular_hora').hide();
                                                                $('#hm_atender_hora').hide();
                                                                $('#hm_confirmar_hora').hide();
                                                                $('#hm_ver_hora').hide();
                                                                $('#hm_espera_paciente_hora').hide();
                                                                $('#confirmar_anulacion_hora').hide();
                                                                $('#confirmacion_hora').hide();

                                                                $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                                $('#consulta').modal('show');
                                                                // $('#id_hora_medica').val(id_hora_medica);
                                                                // console.log(data);
                                                                // $('#reservar_hora').modal('hide');
                                                                //location.reload();
                                                            }
                                                            //rosa
                                                            //Realizando
                                                            else if (data.estado_hora == 5) //else if (info.event.backgroundColor == '#EDBB99')
                                                            {
                                                                //'Realizando')
                                                                $('#hm_anular_hora').hide();
                                                                $('#hm_atender_hora').hide();
                                                                $('#hm_confirmar_hora').hide();
                                                                $('#hm_ver_hora').hide();
                                                                $('#hm_espera_paciente_hora').hide();
                                                                $('#confirmar_anulacion_hora').hide();
                                                                $('#confirmacion_hora').hide();

                                                                $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                                $('#consulta').modal('show');
                                                                // $('#id_hora_medica').val(id_hora_medica);
                                                                // console.log(data);
                                                                // $('#reservar_hora').modal('hide');
                                                                //location.reload();
                                                            }
                                                            //azul
                                                            // Realizada
                                                            else if (data.estado_hora == 6)//else if (info.event.backgroundColor == '#17C1C1')
                                                            {
                                                                //'Realizada')//Paciente atendido
                                                                $('#hm_anular_hora').hide();
                                                                $('#hm_atender_hora').hide();
                                                                $('#hm_confirmar_hora').hide();
                                                                $('#hm_ver_hora').hide();
                                                                $('#hm_espera_paciente_hora').hide();
                                                                $('#confirmar_anulacion_hora').hide();
                                                                $('#confirmacion_hora').hide();

                                                                $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                                $('#consulta').modal('show');
                                                                // $('#id_hora_medica').val(id_hora_medica);
                                                                // console.log(data);
                                                                // $('#reservar_hora').modal('hide');
                                                                //location.reload();
                                                            }
                                                            //naranjo
                                                            //Inasistida
                                                            else if (data.estado_hora == 7)//else if (info.event.backgroundColor == '#F9A825')
                                                            {
                                                                //'Inasistida')
                                                                $('#hm_anular_hora').hide();
                                                                $('#hm_atender_hora').hide();
                                                                $('#hm_confirmar_hora').hide();
                                                                $('#hm_ver_hora').hide();
                                                                $('#hm_espera_paciente_hora').hide();
                                                                $('#confirmar_anulacion_hora').hide();
                                                                $('#confirmacion_hora').hide();

                                                                $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                                $('#consulta').modal('show');
                                                                // $('#id_hora_medica').val(id_hora_medica);
                                                                // console.log(data);
                                                                // $('#reservar_hora').modal('hide');
                                                                //location.reload();

                                                            }


                                                            // $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                            // $('#consulta').modal('show');
                                                            // $('#id_hora_medica').val(id_hora_medica);
                                                            // // console.log(data);
                                                            // // $('#reservar_hora').modal('hide');
                                                            // //location.reload();

                                                        } else {

                                                            swal({
                                                                title: "Paciente no encontrado en el sistema",
                                                                icon: "error",
                                                                buttons: "Aceptar",
                                                                DangerMode: true,
                                                            })
                                                            // alert('Paciente no encontrado en el sistema');
                                                        }

                                                    })
                                                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                                                        console.log(jqXHR, ajaxOptions, thrownError)
                                                    });


                                                $('#datos_hora_medica').show();
                                                $('#cancelacion_hora_medica').hide();
                                                $('#confirmacion_hora_medica').hide();
                                                /*$('#opcion_cancelar_hora_div').hide();*/
                                                $('#id_hora_medica').val(info.event.id);
                                                $('#id_hora_realizar').val(info.event.id);
                                                info.el.style.borderColor = 'red';
                                            },

                                            selectOverlap: function(event) {
                                                {{--  console.log(event);  --}}
                                                return event.rendering === 'background';
                                            },

                                            dateClick: function(date, jsEvent, view) {

                                                var valido = 1;
                                                $.each(date.jsEvent.path, function(index, value)
                                                {
                                                    if(value.className == 'fc-non-business')
                                                    {
                                                        swal({
                                                            title: "Toma de Hora",
                                                            text: "Horario no disponible con el Profesional",
                                                            icon: "error",
                                                            buttons: "Aceptar",
                                                            DangerMode: true,
                                                        })
                                                        valido = 0;
                                                    }

                                                });

                                                if(valido == 1)
                                                {
                                                    {{--   console.log(date.date);  --}}
                                                    {{--   console.log(date.dateStr);  --}}
                                                    var date_str = date.dateStr.replace('T',' ');
                                                    var date_DD = new Date(date_str);
                                                    var curr_date = date_DD.getDate();
                                                    var curr_month = date_DD.getMonth();
                                                    var curr_year = date_DD.getFullYear();
                                                    var curr_hour = date_DD.getHours();
                                                    var curr_mint = date_DD.getMinutes();
                                                    var fecha_seleccionada = curr_year+"-"+curr_month+"-"+curr_date+" "+curr_hour+":"+curr_mint;
                                                    $.each(CalendarEl.getEvents(), function( index, value ) {
                                                        var date_str2 = value.startStr.replace('T',' ');
                                                        var date_DD2 = new Date(date_str2);
                                                        var curr_date2 = date_DD2.getDate();
                                                        var curr_month2 = date_DD2.getMonth();

                                                        var curr_year2 = date_DD2.getFullYear();
                                                        var curr_hour2 = date_DD2.getHours();
                                                        var curr_mint2 = date_DD2.getMinutes();
                                                        var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;


                                                        if($.trim(fecha_seleccionada) == $.trim(fecha_evento))
                                                        {
                                                            valido = 0;
                                                        }
                                                    });

                                                    /** validar  dias pasados */
                                                    var diaActual = '{{ date('d') }}';
                                                    var mesActual = '{{ date('m')-1 }}';
                                                    var anioActual = '{{ date('Y') }}';

                                                    var fecha_actual = new Date(anioActual, mesActual, diaActual);
                                                    var fecha_seleccion = new Date(curr_year, curr_month, curr_date);

                                                    if(fecha_actual > fecha_seleccion){
                                                        console.log("fecha_actual > fecha_seleccion");
                                                        valido_fecha = 0;
                                                    }
                                                    if(fecha_actual <= fecha_seleccion){
                                                        console.log("fecha_actual < fecha_seleccion");
                                                        valido_fecha = 1;
                                                    }

                                                    if(valido == 1)
                                                    {
                                                        if(valido_fecha == 1)
                                                        {
                                                            $('.div_rut_buscar').show();
                                                            $('#agenda_agregar_paciente').modal('show');
                                                            $('#reserva_datos_paciente').hide();
                                                            $('#rut_paciente_reserva').val('');
                                                            $('#reserva_agregar_paciente_hora').hide();
                                                            $('#fecha_consulta').val(date.dateStr);
                                                        }
                                                        else
                                                        {
                                                            swal({
                                                                title: "Seleccion Fecha",
                                                                text: "No Puede tomar Hora en Fechas Anterior a la actual",
                                                                icon: "error",
                                                                buttons: "Aceptar",
                                                                DangerMode: true,
                                                            })
                                                        }
                                                    }
                                                    else
                                                    {
                                                        swal({
                                                            title: "Toma de Hora",
                                                            text: "Hora con profesional ya esta tomada",
                                                            icon: "error",
                                                            buttons: "Aceptar",
                                                            DangerMode: true,
                                                        })
                                                    }
                                                }
                                            },
                                            eventDrop: function(info) {
                                                {{--  console.log(info);  --}}
                                                return false;
                                            },

                                        });

                                        var data_businessHours = [];
                                        $.each(info_profesional_seleccionado.horario, function(key, value){
                                            var dias =  value.dia.split(",");
                                            data_businessHours.push({
                                                'daysOfWeek': dias ,
                                                'startTime': value.hora_inicio,
                                                'endTime': value.hora_termino
                                            });
                                        })
                                        var tem_hiddenDays = info_profesional_seleccionado.horario_data.horario_agenda.split(",");
                                        var tem_hiddenDays2 =[];

                                        $.each(tem_hiddenDays, function(key, value){
                                            {{--  console.log(value);  --}}
                                            tem_hiddenDays2.push(parseInt(value));
                                        });

                                        CalendarEl.setOption('hiddenDays',tem_hiddenDays2  );
                                        CalendarEl.setOption('businessHours', data_businessHours );
                                        CalendarEl.setOption('slotMinTime', info_profesional_seleccionado.horario_data.hora_inicio_agenda );
                                        CalendarEl.setOption('slotMaxTime', info_profesional_seleccionado.horario_data.hora_termino_agenda );
                                        {{--  console.log(CalendarEl.getOption('hiddenDays'));  --}}
                                        {{--  console.log(CalendarEl.getOption('businessHours'));  --}}
                                        {{--  console.log(CalendarEl.getOption('slotMinTime'));  --}}
                                        {{--  console.log(CalendarEl.getOption('slotMaxTime'));  --}}

                                        CalendarEl.render();


                                        {{--  // console.log(calendarEl);  --}}

                                        // var event = calendarEl.getEventById('107');
                                        {{--  // console.log(event);  --}}
                                        // var start = event.start;
                                        {{--  // console.log(start.toISOString());  --}}
                                    }
                                }
                                else
                                {
                                    swal({
                                        title: "Agenda del Profesional.",
                                        text:"El profesional no cuenta con agenda.",
                                        icon: "error",
                                        // buttons: "Aceptar",
                                        //SuccessMode: true,
                                    });
                                    evaluacion =  false;
                                }
                            }
                        }
            });


        }

        {{--  CANCELAR HORA CARGA DE MENSAJE --}}
        function opcion_cancelar_hora()
        {
            $('#datos_hora_medica').hide();
            $('#cancelacion_hora_medica').show();
            $('#cabecera_hora_medica').text('Cancelar Hora Medica');
            $('#hm_anular_hora').hide();
            $('#hm_atender_hora').hide();
            $('#hm_confirmar_hora').hide();
            $('#hm_ver_hora').hide();
            $('#confirmar_anulacion_hora').show();
        };

        {{--  CANCELAR HORA  --}}
        function cancelar_hora() {

            let url = "{{ route('agenda.cancelar_hora') }}";
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
                        {{--  console.log(data);  --}}
                        $('#consulta').modal('hide');
                        swal({
                            title: "Exito!",
                            text: "Hora medica cancelada correctamente",
                            type: "success",
                            confirmButtonText: "Cool"
                        });

                        cargarAgendaProfesional($('#agenda_lugar_atencion_asistente').val(), $('#agenda_profesional_asistente').val(),data.fecha_consulta);


                    } else {
                        alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
                });

        };

        {{--  CONFIRMAR HORA OPCION --}}
        function opcion_confirmar_hora()
        {
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

        {{--  CONFIRMAR HORA  --}}
        function confirmar_hora() {

            let url = "{{ route('agenda.confirmar_hora') }}";
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
                        {{--  console.log(data);  --}}
                        swal({
                            title: "Exito!",
                            text: "Se ha confirmado su hora medica",
                            type: "success",
                            // DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                        cargarAgendaProfesional($('#agenda_lugar_atencion_asistente').val(), $('#agenda_profesional_asistente').val(),data.fecha_consulta);
                        $('#consulta').modal('hide');

                    } else {
                        swal({
                            title: "Error!",
                            text: "No se pudo Confirmar Reserva",
                            type: "danger",
                            DangerMode: true,
                            confirmButtonText: "Cool"
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    {{--  console.log(jqXHR, ajaxOptions, thrownError)  --}}
                });

        };

        {{-- RECIBIR PAGO --}}
        function recepcion_pago()
        {
            let token = CSRF_TOKEN;
            var bono_paciente_rut = $('#bono_paciente_rut').val();
            var bono_paciente_nombre = $('#bono_paciente_nombre').val();
            var bono_profesional_nombre = $('#bono_profesional_nombre').val();
            var bono_profesional_rut = $('#bono_profesional_rut').val();
            var bono_numero = $('#bono_numero').val();
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

            var mensaje = '';
            var valido = 1;

            if(bono_paciente_rut == '')
            {
                mensaje += 'Campo requerido RUT DEL PACIENTE\n';
                valido = 0;
            }
            if(bono_paciente_nombre == '')
            {
                mensaje += 'Campo requerido NOMBRE DEL PACIENTE\n';
                valido = 0;
            }
            if(bono_profesional_nombre == '')
            {
                mensaje += 'Campo requerido NOMBRE DEL PROFESIONAL\n';
                valido = 0;
            }
            if(bono_profesional_rut == '')
            {
                mensaje += 'Campo requerido RUT DEL PROFESIONAL\n';
                valido = 0;
            }
            if(bono_id_clase_bono != 6)
            {
                if(bono_numero == '')
                {
                    mensaje += 'Campo requerido NUMERO DEL BONO O PROGRAMA\n';
                    valido = 0;
                }
            }
            if(bono_valor_consulta == '')
            {
                mensaje += 'Campo requerido VALOR TOTAL\n';
                valido = 0;
            }
            if(bono_prevision == '' || bono_prevision == 0)
            {
                mensaje += 'Campo requerido CONVENIO\n';
                valido = 0;
            }

            if(valido == 1)
            {
                let url = "{{ route('agenda.recibir_bono') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        // _token: token,
                        _token: CSRF_TOKEN,
                        convenio: bono_prevision,
                        convenio_nombre: bono_prevision_nombre,
                        numero_bono: bono_numero,
                        valor_atencion: bono_valor_consulta,
                        glosa: '1',
                        id_profesional: bono_id_profesional,
                        id_lugar_atencion: $('#agenda_lugar_atencion_asistente').val(),
                        id_asistente: '{{ $asistente->id }}',
                        id_paciente: bono_id_paciente,
                        id_tipo_bono: bono_id_tipo_bono,
                        id_clase_bono: bono_id_clase_bono,
                        id_referencia: bono_hora_medica,//une bono a hora medica (para buscar id ficha atencion)
                        numero_sesiones: bono_sn_sesiones
                    }
                })
                .done(function(data)
                {
                    if (data !== 'null')
                    {
                        //data = JSON.parse(data);
                        {{--  console.log('-----------------------');  --}}
                        {{--  console.log(data);  --}}
                        {{--  console.log('-----------------------');  --}}
                        if(data.estado == 1)
                        {
                            swal({
                                title: "Recepción de bonos y programas",
                                text: 'Pago Exitoso',
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            cargarAgendaProfesional(data.hora_medica.id_lugar_atencion,bono_id_profesional,data.hora_medica.fecha_consulta);
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

                        }
                        else
                        {
                            var mensaje = '';
                            if(isset(data.bono))
                            {
                                if(data.bono.estado == 0)
                                {
                                    mensaje +=  bono.estado.msj;
                                }
                                if(data.hora_medica.estado == 0)
                                {
                                    mensaje +=  data.hora_medica.msj;
                                }
                            }
                            else
                            {
                                mensaje += data.error;
                            }

                            swal({
                                title: "Recepción de bonos y programas",
                                text: 'Pago con Problemas.\n'+data.msj+'\n'+mensaje,
                                icon: "success",
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
            }
            else
            {
                swal({
                    title: "Recepción de bonos y programas",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }

        }

        {{--  FORMATEO DE RUT busqueda paciente  --}}
        function formatoRut(rut)
        {
            var valor = rut.value.replace('.','');
            valor = valor.replace('-','');
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

        {{-- BUSCAR PACIENTE --}}
        function buscar_paciente() {
            $('#form_reseva_de_horas').submit(function(e) {
                e.preventDefault();
            });
            let rut = $('#rut_paciente_reserva').val();
            $('#reserva_agregar_paciente_hora').hide();
            $('#reserva_datos_paciente').hide();
            let url = "{{ route('agenda.buscar_rut_paciente') }}";

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
                        if(data.tipo_paciente == 'SI')
                        {
                            {{--  console.log(data);  --}}
                            $('#reserva_datos_paciente').show();
                            $('#reserva_hora_id_paciente').val(data.id);
                            $('#reserva_rut_paciente').text(data.rut);
                            $('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                            $('#reserva_fecha_nacimiento').text(data.fecha_nac);
                            if (data.sexo == 'M') {
                                $('#reserva_sexo').text('Masculino');
                            } else {
                                $('#reserva_sexo').text('Femenino');
                            }
                            $('#reserva_hora_email').text(data.email);
                            $('#reserva_hora_telefono').text(data.telefono_uno);

                            $('#reserva_convenio').text(data.prevision.nombre);
                            $('#reserva_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);

                            $('#rut_paciente_reserva').val('');
                            $('.div_rut_buscar').hide();
                        }
                        else
                        {
                            $('#reserva_datos_paciente').hide();
                            $('#reserva_agregar_paciente_hora').show();

                            $('#reserva_hora_nombres_paciente').val(data.nombres);
                            $('#reserva_hora_apellido_uno').val(data.apellido_uno);
                            $('#reserva_hora_apellido_dos').val(data.apellido_dos);
                            $('#reserva_hora_fecha_nac').val(data.fecha_nac);
                            if(data.sexo != null)
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
                        }
                    } else {
                        $('#reserva_datos_paciente').hide();
                        $('#reserva_agregar_paciente_hora').show();

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        {{--  REGISTRO NUEVO PACIENTE GENERACION DE HORA  --}}
        function agendar_hora_paciente_nuevo()
        {
            let url = "{{ route('agenda.agendar_hora_nuevo_paciente') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();

            let rut_paciente_reserva = $('#rut_paciente_reserva').val();
            if (rut_paciente_reserva == '')
            {
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
            if (reserva_hora_primer_apellido == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el primer apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return false;
            }

            let reserva_hora_segundo_apellido = $('#reserva_hora_apellido_dos').val();
            if (reserva_hora_segundo_apellido == '')
            {
                swal({
                    title: "Error!",
                    text: "Debe ingresar el segundo apellido",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,
                });
                return false;

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

            let reserva_hora_profesion = $('#reserva_hora_profesion').val();
            let reserva_hora_profesion_texto = $('#reserva_hora_profesion option:selected').text();
            if (reserva_hora_profesion == '0') {

                swal({
                    title: "Error!",
                    text: "Debe seleccionar profesión u oficio del paciente",
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
            let reserva_hora_comuna = $('#ciudad_agregar').val();
            if (reserva_hora_comuna == '') {

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
            if (reserva_hora_email == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el email",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }
            let reserva_hora_telefono = $('#reserva_hora_telefono_uno').val();
            if (reserva_hora_telefono == '') {

                swal({
                    title: "Error!",
                    text: "Debe ingresar el teléfono",
                    icon: "error",
                    type: "danger",
                    DangerMode: true,

                });
                return;

            }

            let reserva_hora_confirmacion = $('#reserva_hora_confirmacion').val();
            let reserva_hora_sms = $('#reserva_hora_sms').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        fecha_consulta: fecha_consulta,
                        rut_paciente_reserva: rut_paciente_reserva,
                        reserva_hora_nombre: reserva_hora_nombre,
                        reserva_hora_primer_apellido: reserva_hora_primer_apellido,
                        reserva_hora_segundo_apellido: reserva_hora_segundo_apellido,
                        reserva_hora_fecha_nac: reserva_hora_fecha_nac,
                        reserva_hora_sexo: reserva_hora_sexo,
                        reserva_hora_profesion: reserva_hora_profesion_texto,
                        reserva_hora_convenio: reserva_hora_convenio,
                        reserva_hora_direccion: reserva_hora_direccion,
                        reserva_hora_numero_dir: reserva_hora_numero_dir,
                        reserva_hora_comuna: reserva_hora_comuna,
                        reserva_hora_email: reserva_hora_email,
                        reserva_hora_telefono: reserva_hora_telefono,
                        reserva_hora_confirmacion: reserva_hora_confirmacion,
                        reserva_hora_sms: reserva_hora_sms,
                        id_profesional:id_profesional,
                        id_lugar_atencion:id_lugar_atencion
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);
                        // console.log(data);

                        swal({
                            title: "Exito!",
                            text: "Hora medica agendada correctamente",
                            type: "success",
                            confirmButtonText: "Cool"
                        });
                        $('#reservar_hora').modal('hide');
                        $('#agenda_agregar_paciente').modal('hide');
                        cargarAgendaProfesional($('#agenda_lugar_atencion_asistente').val(), $('#agenda_profesional_asistente').val(),fecha_consulta);
                        // location.reload();

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

        {{--  GENERAR HORA USUARIO EXISTENTE  --}}
        function agendar_hora() {

            let url = "{{ route('agenda.agendar_hora') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let reserva_hora_id = $('#reserva_hora_id_paciente').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();


            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        _token: _token,
                        fecha_consulta: fecha_consulta,
                        reserva_hora_id: reserva_hora_id,
                        id_lugar_atencion: id_lugar_atencion,
                        id_profesional: id_profesional,
                    }
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);

                        if(data.estado == 'error') {

                            swal({
                                title: "Error!",
                                text: data.msj,
                                type: "error",
                                icon: "error",
                                confirmButtonText: "Cool"
                            });

                            $('#agenda_agregar_paciente').modal('hide');
                        }
                        else
                        {
                            swal({
                                title: "Hora Agendada Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            })
                            $('#reservar_hora').modal('hide');
                            $('#agenda_agregar_paciente').modal('hide');
                        }
                        cargarAgendaProfesional($('#agenda_lugar_atencion_asistente').val(), $('#agenda_profesional_asistente').val(),fecha_consulta);

                    } else {

                        swal({
                            title: "Error!",
                            text: "Paciente no encontrado en el sistema",
                            type: "error",
                            confirmButtonText: "Cool"
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        {{--  BUSCANDO CIUDAD --}}
        function buscar_ciudades(id_ciudad=0) {
            buscar_ciudad(id_ciudad);
        }
        function buscar_ciudad(id_ciudad=0) {


            var region = $('#region_agregar').val();

            if (region == null) {
                region = $('#region_contacto_modificar').val();
            }
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

                        let ciudades = $('#ciudad_lugar_atencion_modificar');
                        let ciudades_contacto = $('#ciudad_contacto_modificar');
                        let ciudades_agregar = $('#ciudad_agregar');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        ciudades_contacto.find('option').remove();
                        ciudades_contacto.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades_contacto.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        ciudades_agregar.find('option').remove();
                        ciudades_agregar.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades_agregar.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if(id_ciudad != 0)
                        {
                            ciudades.val(id_ciudad);
                            ciudades_contacto.val(id_ciudad);
                            ciudades_agregar.val(id_ciudad);

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

        };

        {{--  **** PERFIL DE ASISTENTE  --}}

        {{--  REGISTROS DATOS PERSONALES  --}}
        function editar_asistente_datos_personales(id) {

            let id_asistente = id;

            let rut = $('#editar_rut').val();
            let nombre = $('#editar_nombre').val();
            let apellido_uno = $('#editar_apellido_uno').val();
            let apellido_dos = $('#editar_apellido_dos').val();
            let sexo = $('#editar_sexo').val();
            let nacimiento = $('#editar_nacimiento').val();
            let url = "{{ route('asistente.editar_datos_personales_perfil') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id_asistente: id_asistente,
                        rut: rut,
                        nombres: nombre,
                        apellido_uno: apellido_uno,
                        apellido_dos: apellido_dos,
                        sexo: sexo,
                        nacimiento: nacimiento
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Datos del personales editados correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        var text_sexo = '';
                        if(response.asistente.sexo == 'F')
                            text_sexo = 'Mujer';
                        else if(response.asistente.sexo == 'M')
                            text_sexo = 'Hombre';
                        else
                            text_sexo = 'Otro';

                        var fecha_nacimiento = moment(response.asistente.fecha_nac,'YYYY/MM/DD').format('DD/MM/YYYY');
                        $('#ver_rut').html(response.asistente.rut);
                        $('#ver_nombre').html(response.asistente.nombres);
                        $('#ver_apellido_uno').html(response.asistente.apellido_uno);
                        $('#ver_apellido_dos').html(response.asistente.apellido_dos);
                        $('#ver_sexo').html(text_sexo);
                        $('#ver_nacimiento').html(fecha_nacimiento);

                        $('#info_basica-1').addClass('show');
                        $('#info_basica-2').removeClass('show');


                    } else {
                        swal({
                            title: "Error al Editar los datos personales",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                    }
                })
                .fail(function() {
                    console.log("error");
                });
        }

        {{--  REGISTROS CONTACTO  --}}
        function editar_asistente_datos_contacto(id) {

            let id_asistente = id;
            let email = $('#editar_email').val();
            let telefono_uno = $('#editar_telefono_uno').val();
            let url = "{{ route('asistente.editar_datos_contacto_perfil') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id_asistente: id_asistente,
                        email: email,
                        telefono_uno: telefono_uno,
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Datos de contacto editados correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        $('#ver_email').html(response.asistente.email);
                        $('#ver_telefono_uno').html(response.asistente.telefono_uno);

                        $('#info_contacto_1').addClass('show');
                        $('#info_contacto_2').removeClass('show');

                    } else {
                        swal({
                            title: "Error al Editar los datos de contacto",
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

        {{--  REGISTROS RESIDENCIA  --}}
        function editar_asistente_datos_residencia(id) {

            let id_asistente = id;
            var id_region = $('#region_agregar').val();
            var nombre_region = $('#region_agregar option:selected').text();
            var id_ciudad = $('#ciudad_agregar').val();
            var nombre_ciudad = $('#ciudad_agregar option:selected').text();
            var direccion = $('#direccion').val();
            var numero_dir = $('#numero_dir').val();


            let email = $('#editar_email').val();
            let telefono_uno = $('#editar_telefono_uno').val();
            let url = "{{ route('asistente.editar_datos_direccion_perfil') }}";

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id_asistente: id_asistente,
                        id_ciudad: id_ciudad,
                        direccion: direccion,
                        numero_dir: numero_dir,
                    },
                })
                .done(function(response) {

                    if (response.success) {
                        swal({
                            title: "Datos de Residencia editados correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })


                        $('#ver_region').html(nombre_region);
                        $('#ver_ciudad').html(nombre_ciudad);
                        $('#ver_direccion').html(direccion+', #'+numero_dir);

                        $('#info_residencial_1').addClass('show');
                        $('#info_residencial_2').removeClass('show');

                    } else {
                        swal({
                            title: "Error al Editar los datos de Residencia",
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

        {{--  ***** CONTACTO DE EMERGENCIA  --}}
        {{--  CARGA LISTA DE CONTACTOS DE EMERGENCIA  --}}
        function cargar_lista_contacto() {

            $('#contactos_emergencia tbody').empty();
            url = "{{ route('asistente.cargar_contacto_emergencia') }}";
            $.ajax({
                    url: url,
                    type: "get",
                    data: {}
                })
                .done(function(data) {

                    if (data.estado == 1) {
                        for (i = 0; i < data.registros.length; i++) {
                            var id = data.registros[i].id;
                            var prioridad = data.registros[i].prioridad;
                            var nombre = data.registros[i].nombre;
                            var apellido_uno = data.registros[i].apellido_uno;
                            var apellido_dos = data.registros[i].apellido_dos;
                            var parentezco = data.registros[i].parentezco;
                            var id_asistente = data.id_asistente;

                            var fila = '';
                            fila += '<tr>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        '+prioridad+'';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        '+nombre+'';
                            fila += '        <br>'+apellido_uno+' '+apellido_dos+'';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        '+parentezco+'';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <button id="btn_info_contacto"';
                            fila += '            onclick="cargar_datos_contacto('+id+')"';
                            fila += '            class="btn btn-info btn-sm rounded-circle"';
                            fila += '            data-toggle="modal"';
                            fila += '            data-target="#info_contacto_emergencia"';
                            fila += '            title="Información de contacto"';
                            fila += '            data-placement="top"><i';
                            fila += '                class="feather icon-phone-call"></i>';
                            fila += '        </button>';
                            fila += '        <button id="btn_editar_contacto"';
                            fila += '            onclick="cargar_datos_contacto('+id+')"';
                            fila += '            class="btn btn-warning btn-sm rounded-circle"';
                            fila += '            data-toggle="modal"';
                            fila += '            data-target="#editar_contacto_emergencia"';
                            fila += '            title="Editar contacto"';
                            fila += '            data-placement="top"><i';
                            fila += '                class="feather icon-edit"></i>';
                            fila += '        </button>';
                            fila += '        <button';
                            fila += '            class="btn btn-danger btn-sm rounded-circle"';
                            fila += '            onclick="eliminar_contacto_asistente('+id+', '+id_asistente+')"';
                            fila += '            data-toggle="tooltip"';
                            fila += '            title="Eliminar contacto">';
                            fila += '            <i class="feather icon-x"></i>';
                            fila += '        </button>';
                            fila += '    </td>';
                            fila += '</tr>';

                            $('#contactos_emergencia tbody').append(fila);
                        }
                    }
                    else
                    {
                        $('#contactos_emergencia tbody').html('');
                        var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
                        $('#contactos_emergencia tbody').append(fila);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        {{--  CARGA DATOS DE CONTACTO DE EMERGENCIA  --}}
        function cargar_datos_contacto(id) {
            let id_contacto = id;
            url = "{{ route('asistente.cargar_datos_contacto') }}";
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

                        $('#ver_direccion_contacto').text(data.direccion.direccion + ' ' + data.direccion.numero_dir + ' Región de ' + data.region.nombre + ', ' + data.ciudad.nombre);
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


                        $('#region_agregar').val('');
                        $('#region_contacto_modificar').val(data.region.id);

                        buscar_ciudad(data.ciudad.id);

                        {{--  $("#ciudad_contacto_modificar[value=" + data.region.id + "]").attr("selected", true);  --}}
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

        {{--  ELIMINAR CONTACTO EMERGENCIA  --}}
        function eliminar_contacto_asistente(contacto, asistente) {


            let id_contacto = contacto;
            let id_asistente = asistente

            let url = "{{ route('asistente.eliminar_contacto_asistente') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_contacto: id_contacto,
                        id_asistente: id_asistente
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
                        cargar_lista_contacto();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        {{--  EDITAR CONTACTO DE EMERGENCIA  --}}
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
            let url = "{{ route('asistente.editar_contacto') }}";

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
                        cargar_lista_contacto();
                        $('#editar_contacto_emergencia').modal('hide');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };


        {{--  ABRIR MODAL AGREGAR CONTACTO EMERGENCIA  --}}
        function modal_agregar_contacto_emergencia() {
            $('#agregar_contacto_emergencia').modal('show');
        }

        {{--  BUSCCAR INFORMACION DE CONTACTO DE EMERGENCIA  --}}
        function buscar_contacto() {

            let rut_contacto = $('#rut_nuevo_contacto').val();
            let url = "{{ route('asistente.buscar_contacto') }}"

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        rut_contacto: rut_contacto,
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
                            $('#rut_nuevo_contacto').val('');

                        } else {
                            data = JSON.parse(data);
                            for (let i = 0; i < data.region.length; i++) {
                                if (data.region[i].id == data.ciudad.id_region) {
                                    $('#region_agregar').val(data.region[i].id);
                                    buscar_ciudad(data.ciudad.id);
                                }
                            }
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

        {{--  AGREGAR CONTACTO EMERGENCIA  --}}
        function registrar_contacto_emergencia() {

            let url = "{{ route('asistente.registrar_contacto_emergencia') }}";

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
            if(rut == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar rut.\n';
            }
            if(nombres == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar nombres.\n';
            }
            if(apellido_uno == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar apellido paterno.\n';
            }
            if(apellido_dos == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar apellido materno.\n';
            }
            if(fecha == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar fecha.\n';
            }
            if(direccion == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar direccion.\n';
            }
            if(id_ciudad == '' || id_ciudad == '0')
            {
                valido = 0;
                mensaje += 'Debe ingresar ciudad.\n';
            }
            if(email == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar email.\n';
            }
            if(telefono == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar telefono.\n';
            }
            if(parentezco == '' || parentezco == '0')
            {
                valido = 0;
                mensaje += 'Debe ingresar parentezco.\n';
            }
            if(prioridad == '' || prioridad == '0')
            {
                valido = 0;
                mensaje += 'Debe ingresar prioridad.\n';
            }
            if(numero_dir == '')
            {
                valido = 0;
                mensaje += 'Debe ingresar numero direccion.\n';
            }

            if(valido == 1)
            {
                $.ajax({

                        url: url,
                        type: "get",
                        data: {
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
                            cargar_lista_contacto()


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
            }
            else
            {
                swal({
                    title: "Registro Contacto de Emergencia.",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        };

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
                            // DangerMode: true,
                        })
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            $('#info_profesional').modal('show');
        }

        {{--  EDITAR CONFIGURACION MOTOR BUSQUEDA  --}}
        function editar_configuracion_busqueda()
        {
            let buscador = $('input:radio[name=buscador]:checked').val();
            let modalidad = $('#modalidad').val();
            let text_modalidad = $('#modalidad option:selected').text();
            let cv = $('#cv').val();

            if(buscador == 1)
            {
                if(modalidad == '')
                {
                    swal({
                        title: "Seleccione Modalidad de trabajo",
                        icon: "error",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                    return false;
                }
            }

            let url = "{{ route('asistente.editar_configuracion_busqueda') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    buscador: buscador,
                    modalidad: modalidad,
                    cv: cv,
                }

            })
            .done(function(data) {
                if (data.estado == 1)
                {

                    swal({
                        title: "Datos de contacto editados correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })

                    var text_buscador = '';
                    if(buscador)
                        text_buscador = 'SI';
                    else
                        text_buscador = 'NO';


                    $('#mensaje_buscador').html(text_buscador);
                    $('#mensaje_modalidad').html(text_modalidad);

                    $('#buscadores_1').addClass('show');
                    $('#buscadores_2').removeClass('show');

                }
                else
                {
                    swal({
                        title: "Configuración motores de búsqueda no registrada",
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

        function cargar_archivo_asistente()
        {

        }


        {{--  ***** FIN  FUNCIONES ******  --}}

    </script>
    @yield('page-script')
</body>
</html>
