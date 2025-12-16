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

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    {{-- estilos de atencion medica --}}
    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}"/>


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

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>
    <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

    <!-- momnent -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

   {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>


    <!-- select2 -->
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>

    <!-- rut -->
    <script src="{{ asset('js/rut.js') }}"></script>

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

            $('#autorizacion_atencion').change(function()
            {
                if(this.checked)
                {
                    $('#agenda_validar_auto_menor_edad').modal({backdrop: 'static', keyboard: false});
                    $('#agenda_validar_auto_menor_edad').modal('show');
                    solicitarAutorizacionMenorEdad();
                }
                else
                {
                    // $('#agenda_validar_auto_menor_edad').modal('hide');
                }
            });

            {{--  Tablas rendir caja  --}}
            $('#tabla_rendir_caja').DataTable({
                responsive: true,
            });

        });


        function cerrar_modal_infoProf()
        {
            $('#info_prof').modal('hide');
        }

        function cerrarModalAutorizacionMenorEdad()
        {
            swal({
                title: "Autorización Para Atención de Menor de Edad.",
                text: 'Al "Aceptar" cierra la ventana sin esperar Autorización del Responsable.\n Debe Realizar la Solicitud Nuevamente.',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                } else {

                    $('#agenda_validar_auto_menor_edad').modal('hide');
                    cancelarautorizacionMenorEdad();

                }
            })
        };

        function solicitarAutorizacionMenorEdad()
        {
            estado_cancelado = 0;
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var id_profesional = $('#agenda_profesional_asistente').val();
            var id_paciente = $('#reserva_hora_id_paciente').val();
            var edad = $('#reserva_hora_edad').val();
            var id_responsable = $('#reserva_hora_id_responsable').val();
            var nombre_representante = $('#div_info_representante').html();

            let url = "{{ route('asistente.solicitar_aprobacion.atencion_menor') }}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id_lugar_atencion : id_lugar_atencion,
                    id_profesional : id_profesional,
                    id_paciente : id_paciente,
                    edad : edad,
                    id_responsable : id_responsable,
                    nombre_representante : nombre_representante,
                },
                success:function(data){
                    if (data !== 'null')
                    {
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#imagen_carga').hide();
                            $('#imagen_resultado').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#text_resultado').html('<h3>En espera de Aprobación</h3>');

                            var token_temp = '';
                            $.each(data.registros, function (key, value) {

                                if(value.estado == 1)
                                {
                                    if(token_temp == '')
                                    {
                                        if(data.registros.length>1)
                                            token_temp = value.log_users_devices.token+'-';
                                        else
                                            token_temp = value.log_users_devices.token;
                                    }
                                    else
                                        token_temp = value.log_users_devices.token;

                                    validar_autorizacion_menor_edad(value.log_users_devices.token);
                                }
                            });

                            $('#agenda_validar_auto_menor_token').val(token_temp);
                        }
                        else
                        {
                            $('#imagen_carga').hide();
                            $('#imagen_resultado').html('<img src="{{ asset('images/spinner.svg') }}" alt="Cargando">');
                            $('#text_resultado').html('<h3>Problema al solicitar Aprobación.</h3>');
                        }
                    }
                    else
                    {
                        console.log('error');
                        console.log(data);
                    }
                }
            });
        }

        function validar_autorizacion_menor_edad(token)
        {
            if(estado_cancelado == 0)
            {
                let url = "{{ route('asistente.aprobacion.validar.atencion_menor') }}";
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        token : token,
                    },
                    success:function(data){
                        console.log(data);
                        if(data.estado == 1)
                        {
                            if(data.registro.estado == 1)
                            {
                                $('#imagen_carga').hide();
                                $('#imagen_resultado').html('<img src="{{ asset('images/iconos/aprobacion.svg') }}" alt="Cargando">');
                                $('#text_resultado').html('<h3>Aprobado</h3>');

                                $('#autorizacion_atencion_token').val(token);

                                setTimeout(function(){
                                    $('#agenda_validar_auto_menor_edad').modal('hide');
                                }, 3000);
                            }
                            else if(data.registro.estado == 2)
                            {
                                $('#imagen_carga').hide();
                                $('#imagen_resultado').html('<img src="{{ asset('images/iconos/error.svg') }}" alt="Cargando">');
                                $('#text_resultado').html('<h3>Rechazado</h3>');
                                $('#autorizacion_atencion').prop('checked', false);
                            }
                            else
                            {
                                setTimeout(function(){
                                    validar_autorizacion_menor_edad(token);
                                }, 2000);

                            }
                        }
                        else if(data.estado == 2)
                        {
                            $('#imagen_carga').hide();
                            $('#imagen_resultado').html('<img src="{{ asset('images/iconos/error.svg') }}" alt="Cargando">');
                            $('#text_resultado').html('<h3>Rechazado</h3><br/><p>Debe Intentar nuevamente.</p>');
                            setTimeout(function(){
                                $('#agenda_validar_auto_menor_edad').modal('hide');
                            }, 2000);
                        }
                        else
                        {
                            setTimeout(function(){
                                validar_autorizacion_menor_edad(token);
                            }, 2000);
                        }
                    }
                });
            }
        }

        var estado_cancelado = 0;
        function cancelarautorizacionMenorEdad()
        {
            var token  = $('#agenda_validar_auto_menor_token').val();
            let url = "{{ route('asistente.aprobacion.cancelar.atencion_menor') }}";


            var temp_token = token.split('-');

            $.each(temp_token, function (key, value)
            {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        token : value,
                    },
                    success:function(data){
                        console.log(data);
                        if(data.estado == 1)
                        {
                            $('#imagen_carga').show();
                            $('#imagen_resultado').html('');
                            $('#text_resultado').html('');
                            $('#autorizacion_atencion_token').val('');


                            swal({
                                title: "Solicitud de aprobacion.",
                                text:"Cancelada",
                                icon: "success",
                            });

                            setTimeout(function(){
                                $('#agenda_validar_auto_menor_edad').modal('hide');
                                $('#autorizacion_atencion').prop('checked', false);
                            }, 1000);

                            estado_cancelado = 1;
                        }

                        else
                        {
                            swal({
                                title: "Solicitud de aprobacion.",
                                text:"Falla en proceso de Cancelación",
                                icon: "error",
                            });
                        }
                    }
                });
            });

        }

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
                            });
                            return false;
                        }
                    }
                    end(arrayTemp);
                }
            });
        }

        {{--  CARGA AGENDE DEL PROFESIONAL  --}}
        var activeDaysInRange = [];
        function cargarAgendaProfesional(tipo_agenda, fecha)
        {
            console.log('template.asistente.template');
            if(fecha != undefined && fecha != '')
            {
                var res = fecha.split('T')[0];
                fecha = res;
            }
            else
            {
                fecha = '{{ date("Y-m-d") }}';
            }

            $('.btn-tipo-agenda').css('background-color','#387fb6');
            $('.btn-agenda-'+tipo_agenda).css('background-color','#1cbebe');
            $('#id_tipo_agenda').val(tipo_agenda);

            switch (parseInt(tipo_agenda)) {
                case 1://consulta
                    $('#titulo_tipo_agenda').html('AGENDA DE CONSULTA');
                    $('#btn_ver_agregar_hora_extra').attr('disabled', false);
                    $('#btn_ver_agregar_hora_examen').attr('disabled', false);
                    break;
                case 2://dental
                    $('#titulo_tipo_agenda').html('AGENDA DE DENTAL');
                    $('#btn_ver_agregar_hora_extra').attr('disabled', true);
                    $('#btn_ver_agregar_hora_examen').attr('disabled', true);
                    break;
                case 3://telemedicina
                    $('#titulo_tipo_agenda').html('AGENDA DE TELEMEDICINA');
                    $('#btn_ver_agregar_hora_extra').attr('disabled', true);
                    $('#btn_ver_agregar_hora_examen').attr('disabled', true);
                    break;
                case 4://examen
                    $('#titulo_tipo_agenda').html('AGENDA DE EXAMEN');
                    $('#btn_ver_agregar_hora_extra').attr('disabled', true);
                    $('#btn_ver_agregar_hora_examen').attr('disabled', true);
                    break;
            }

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
                    tipo_agenda: tipo_agenda,
                },
                success: function(data){
                    $('.btn-tipo-agenda').hide();
                    if (data !== 'null')
                    {
                        if(data.estado == 1)
                        {
                            /** activar tipos de agendas del profesional */
                            console.log('data.tipo_agendas');
                            console.log(data);
                            var tipo_agendas_cant = data.tipo_agendas.length;
                            if(tipo_agendas_cant > 0)
                            {
                                carga_tipos_agendas(data.tipo_agendas);
                                carga_tipos_agendas_anular(data.tipo_agendas);
                                $.each(data.tipo_agendas, function (key, value)
                                {
                                    $('.btn-agenda-'+value).show();
                                });
                            }
                        }

                        if(data.estado == 1 && data.horario.length!=0)
                        {
                            $('#tabla_info_profesional').show();
                            $('#seccion_agenda_botones').show();
                            $('#seccion_agenda_agendas').show();
                            $('#nombre_profesional_agenda').html(data.profesional.nombre.toUpperCase()  + ' ' + data.profesional.apellido_uno.toUpperCase()  + ' ' + data.profesional.apellido_dos.toUpperCase() );

                            var especialidad = '';
                            especialidad += data.especialidad.nombre.toUpperCase() +'<br>';
                            especialidad += data.tipo_especialidad.nombre.toUpperCase() +'<br>';
                            if(data.sub_tipo_especialidad != '')
                                especialidad += data.sub_tipo_especialidad.nombre.toUpperCase() +'<br>';
                            $('#especialidad_porfesional_agenda').html(especialidad);
                            $('#btn_ver_info_profesional_seleccionado').attr('onclick','info_profesional('+data.profesional.id+');');

                            $('#img_profesional').attr('src', data.profesional.img_profesional);

                            if(data.horario.length > 0)
                            {
                                info_profesional_seleccionado['profesional'] = data.profesional;
                                info_profesional_seleccionado['horario'] = data.horario;
                                info_profesional_seleccionado['horario_data'] = data.horario_data;
                                evaluacion =  true;
                            }
                            else
                            {
                                evaluacion =  false;
                            }

                            // carga de examenes posibles por el profesional
                            $('#m_hora_examen_lista_examenes').html('<option value="">Seleccione</option>');
                            if(data.examen_tipo != null && data.examen_tipo != '')
                            {
                                data.examen_tipo.forEach(element => {
                                    $('#m_hora_examen_lista_examenes').append('<option value="'+element.id+'">'+element.nombre+'</option>');
                                });
                            }

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
                                    headerToolbar: {
                                        //start: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek', // will normally be on the left. if RTL, will be on the right
                                        //center: 'title',
                                        //end: 'today prev,next'
                                        start: 'prev,next today',
                                        center: 'title',
                                        // right: 'timeGridWeek,listWeek'
                                        right: 'timeGridWeek,listWeek'
                                    },
                                    weekends: true,
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
                                                                if(data.estado == 1)
                                                                {
                                                                    var arrayTemp = [];
                                                                    data.registros.forEach(element => {
                                                                        var rut = element.paciente.rut+' | '
                                                                        var valor = element.estado.valor+' | '
                                                                        var comentarios_confirmacion = '';
                                                                        if(comentarios_confirmacion != 'null')
                                                                            comentarios_confirmacion = element.comentarios_confirmacion+' | '
                                                                        var nombre = element.paciente.prevision.nombre
                                                                        var descripcion = '';

                                                                        if(element.tipo_hora_medica == 'B')
                                                                        {
                                                                            descripcion += valor;
                                                                            arrayTemp.push({
                                                                                            id: element.id,
                                                                                            title: element.descripcion,
                                                                                            description: descripcion ,
                                                                                            start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                                            end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                                            backgroundColor: element.estado.color
                                                                            });
                                                                        }
                                                                        else
                                                                        {
                                                                            descripcion += rut;
                                                                            descripcion += valor;
                                                                            descripcion += comentarios_confirmacion;
                                                                            descripcion += nombre;
                                                                            arrayTemp.push({
                                                                                            id: element.id,
                                                                                            title: element.tipo_hora_medica+' - '+element.descripcion,
                                                                                            description: descripcion ,
                                                                                            start: element.fecha_consulta + 'T' + element.hora_inicio,
                                                                                            end: element.fecha_consulta + 'T' + element.hora_termino,
                                                                                            backgroundColor: element.estado.color
                                                                            });
                                                                        }
                                                                    });
                                                                    console.log(arrayTemp);
                                                                    end(arrayTemp);
                                                                }
                                                                else
                                                                {
                                                                    console.log('falla en carga');
                                                                }
                                                            }

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
                                                if (data != null)
                                                {
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

                                                    }
                                                    //verde
                                                    // CONFIRMADO
                                                    else if(data.estado_hora == 2)//if (info.event.backgroundColor == '#94BF61')
                                                    {
                                                        $('#modal_recepcion_bonos_api').modal('show');

                                                        /** PESTAÑA DE RECIBIR PAGO */
                                                        $('#bono_paciente_rut').val(data.paciente.rut);
                                                        $('#bono_paciente_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#bono_profesional_nombre').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                        $('#bono_profesional_rut').val( data.profesional.rut);
                                                        $('#bono_hora_medica').val(info.event.id);
                                                        $('#bono_id_profesional').val(data.profesional.id);
                                                        $('#bono_id_paciente').val(data.paciente.id);

                                                        /** PESTAÑA DE VENTA DE BONO */
                                                        $('#venta_rut').val(data.paciente.rut);
                                                        $('#venta_serie').val('');
                                                        $('#venta_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#venta_paciente_nombre').val(data.paciente.nombres);
                                                        $('#venta_paciente_apellido_uno').val(data.paciente.apellido_uno);
                                                        $('#venta_paciente_apellido_dos').val(data.paciente.apellido_dos);
                                                        $('#venta_paciente_email').val(data.paciente.email);
                                                        $('#venta_previsioon').val('0');
                                                        $('#venta_folio').val('');
                                                        $('#venta_valor_consulta').val('');
                                                        $('#venta_valor_pagar').val('');
                                                        $('#venta_valor_seguro').val('');
                                                        $('#venta_valor_copago').val('');

                                                        $('.venta_autorizada').hide();

                                                        $('#div_btn_pedir_autorizacion').show();

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


                                                    }

                                                }
                                                else
                                                {
                                                    swal({
                                                        title: "Paciente no encontrado en el sistema",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    })

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
                                        var valido_fecha = 1;
										/** VALIDACION DE FUERA DE HORARIO */
                                        // $.each(date.jsEvent.path, function(index, value)
                                        $.each(date.jsEvent.srcElement.classList, function(index, value)
                                        {
                                            console.log(value);
                                            if(value == 'fc-non-business')
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

                                            /** VALIDAR BLOQUEO */
                                            CalendarEl.getEvents().forEach(function(event) {
                                                var eventEnd = typeof event.end === 'string' ? moment(event.end) : event.end;
                                                if (date.date >= event.start && date.date <= eventEnd) {
                                                    valido = 0;
                                                    console.log('Existe un evento en esta fecha: ' + event.title);
                                                    console.log(date.date);
                                                    console.log(event.start);
                                                    console.log(eventEnd);

                                                    swal({
                                                        title: "Toma de Hora",
                                                        text: "El profesional no atiende en este periodo.",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    });
                                                    return false;
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
                                    // console.log(value);
                                    tem_hiddenDays2.push(parseInt(value));
                                });

                                CalendarEl.setOption('hiddenDays',tem_hiddenDays2  );
                                CalendarEl.setOption('businessHours', data_businessHours );
                                CalendarEl.setOption('slotMinTime', info_profesional_seleccionado.horario_data.hora_inicio_agenda );
                                CalendarEl.setOption('slotMaxTime', info_profesional_seleccionado.horario_data.hora_termino_agenda );

                                 /** registra la fecha de la semana en la vista */
                                 CalendarEl.on('datesSet', function(info) {
                                    activeDaysInRange = [];
                                    var dia_inicio = CalendarEl.view.currentStart;
                                    var dia_fin = CalendarEl.view.currentEnd;
                                    var array_activos = CalendarEl.getCurrentData().dateProfileGenerator.isHiddenDayHash;
                                    getInactiveDays(dia_inicio, dia_fin, array_activos);
                                    console.log('activeDaysInRange2:', activeDaysInRange);
                                })

								CalendarEl.render();

                                if(fecha != '' && fecha != null)
                                    CalendarEl.gotoDate(fecha);
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
                                $('#agenda').html('');
                                $('#titulo_tipo_agenda').html('');
                                $('#tabla_info_profesional').hide();
                                $('#seccion_agenda_botones').hide();
                                $('#seccion_agenda_agendas').hide();
                            }
                        }
                        else
                        {
                            swal({
                                title: "Agenda del Profesional.",
                                text:"El profesional no cuenta con agenda.",
                                icon: "error",
                            });
                            evaluacion =  false;
                            $('#agenda').html('');
                            $('#titulo_tipo_agenda').html('');
                            $('#tabla_info_profesional').hide();
                            $('#seccion_agenda_botones').hide();
                            $('#seccion_agenda_agendas').hide();
                        }
                    }
                    else
                    {
                        $('#agenda').html('');
                        $('#titulo_tipo_agenda').html('');
                        $('#tabla_info_profesional').hide();
                        $('#seccion_agenda_botones').hide();
                        $('#seccion_agenda_agendas').hide();
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

                        cargarAgendaProfesional($('#id_tipo_agenda').val(), data.fecha_consulta);


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
                        cargarAgendaProfesional($('#id_tipo_agenda').val(),data.fecha_consulta);
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
                        if(data.estado == 1)
                        {
                            swal({
                                title: "Recepción de bonos y programas",
                                text: 'Pago Exitoso',
                                icon: "success",
                            });
                            cargarAgendaProfesional($('#id_tipo_agenda').val(),data.hora_medica.fecha_consulta);
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
                });
            }

        }

        {{-- BUSCAR PACIENTE --}}
        function buscar_paciente() {
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
            evaluar_edad();
            $('.div_representante_nuevo').hide();
            $('.div_representante_existente').hide();

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

                            $('#reserva_hora_edad').val(data.edad);

                            $('#id_lugar_atencion').val($('#agenda_lugar_atencion_asistente').val());

                            if(data.edad < 18)
                            {
                                $('#acompanante_representante').prop("checked", true);
                                $('#acompanante_acompanante').prop("checked", false);
                                $('#autorizacion_atencion').prop("checked", false);

                                $('#div_info_representante').html(data.nombre_responsable);

                                $('#reserva_hora_id_acompanante').html('');
                                $.each(data.acompanante, function (indexInArray, valueOfElement)
                                {
                                    console.log(valueOfElement);
                                    var html = '';
                                    html = '<option value="'+valueOfElement.id_acompanante+'">'+valueOfElement.acompanante.nombre+' '+valueOfElement.acompanante.apellido_uno+' - '+valueOfElement.acompanante.rut+'</option>';
                                    $('#reserva_hora_id_acompanante').append(html);
                                });
                                $('#reserva_hora_id_acompanante').select2();

                                $('#reserva_hora_id_responsable').val(data.id_responsable);

                                $('#seccion_acompanante').show();
                                $('#seccion_autorizacion').show();
                            }
                            else
                            {
                                $('#acompanante_representante').prop("checked",false);
                                $('#acompanante_acompanante').prop("checked",false);
                                $('#autorizacion_atencion').prop("checked",false);
                                $('#reserva_hora_id_acompanante').val('');


                                $('#reserva_hora_id_responsable').val('');

                                $('#seccion_acompanante').hide();
                                $('#seccion_autorizacion').hide();
                            }
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

        function agendar_hora_paciente_nuevo() {

            let url = "{{ route('agenda.agendar_hora_nuevo_paciente') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
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
            }
            else
            {
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
            if (reserva_hora_comuna == '' || reserva_hora_comuna == '0' || reserva_hora_comuna == 'null' || reserva_hora_comuna == null) {

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
            if (hoy.getMonth() < fechaNacimiento.getMonth() || (hoy.getMonth() === fechaNacimiento.getMonth() && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }

            // if( edad > 18 )
            if( $('#paciente_dependiente').prop('checked') == false )
            {
                if (reserva_hora_email == '') {

                    if(reserva_hora_telefono_uno == '' && (reserva_result_codigo_validacion =='' || reserva_result_codigo_validacion =='0') )
                    {
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el email o teléfono 1",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                    else
                    {
                        if(reserva_result_codigo_validacion =='0')
                        {
                            console.log( 'reserva_hora_email' );
                            console.log( reserva_hora_email );
                            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                            if (caract.test(reserva_hora_email) == false){
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el email o teléfono 2",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            }
                        }

                    }
                }
                else
                {

                    if (reserva_hora_telefono_uno == '')
                    {
                        swal({
                            title: "Error!",
                            text: "Debe ingresar el teléfono",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,
                        });
                        return;
                    }
                    else
                    {
                        if(reserva_hora_email == '' && (reserva_result_codigo_validacion =='' || reserva_result_codigo_validacion =='0'))
                        {
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
            if($('#paciente_dependiente').prop('checked')  == true)
                dependiente = 1;
            else if($('#paciente_dependiente').prop('checked')  == false)
                dependiente = 0;

            if( edad < 18 || $('#paciente_dependiente').prop('checked')==true)
            {
                if(reserva_hora_representante_agregar_relacion == '')
                {
                    swal({
                        title: "Error!",
                        text: "Debe seleccionar Relación",
                        icon: "error",
                        type: "danger",
                        DangerMode: true,
                    });
                    return;
                }
                if(reserva_representante_nuevo_exitente == '1')
                {
                    /** existente */
                    if(reserva_representante_id == '')
                    {
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
                }
                else
                {
                    /** nuevo */
                    if( reserva_hora_representante_nombres_paciente == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Nombre del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_apellido_uno == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Apellido Paterno del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_apellido_dos == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Apellido Materno del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_fecha_nac == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Fecha Nacimiento del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    else
                    {
                        reserva_hora_representante_fecha_nac = formatDateDB(reserva_hora_representante_fecha_nac);
                    }
                    if( reserva_hora_representante_sexo == '' )
                    {
                        swal({
                            title: "Error!",
                            text: "Sexo del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }
                    if( reserva_hora_representante_direccion == '' )
                    {
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
                    if( reserva_hora_representante_ciudad_agregar == '' || reserva_hora_representante_ciudad_agregar == '0' || reserva_hora_representante_ciudad_agregar == 'null' || reserva_hora_representante_ciudad_agregar == null )
                    {
                        swal({
                            title: "Error!",
                            text: "Ciudad del Representante requerido",
                            icon: "error",
                            type: "danger",
                            DangerMode: true,

                        });
                        return;
                    }

                    if( $('#paciente_dependiente').prop('checked') == true )
                    {
                        if (reserva_hora_representante_correo == '') {

                            if(reserva_hora_representante_telefono_uno == '' && (reserva_hora_representante_result_codigo_validacion =='' || reserva_hora_representante_result_codigo_validacion =='0') )
                            {
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el email o teléfono del representante",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            }
                            else
                            {
                                var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                                if (caract.test(reserva_hora_representante_correo) == false){
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
                        else
                        {

                            if (reserva_hora_representante_telefono_uno == '')
                            {
                                swal({
                                    title: "Error!",
                                    text: "Debe ingresar el teléfono del representante",
                                    icon: "error",
                                    type: "danger",
                                    DangerMode: true,
                                });
                                return;
                            }
                            else
                            {
                                if(reserva_hora_representante_correo == '' && (reserva_hora_representante_result_codigo_validacion =='' || reserva_hora_representante_result_codigo_validacion =='0'))
                                {
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
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();

            console.log('ajax');
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
                        id_profesional:id_profesional,
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
                            $('#reservar_hora').modal('hide');
                            $('#agenda_agregar_paciente').modal('hide');
                            cargarAgendaProfesional($('#id_tipo_agenda').val(),fecha_consulta);
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

        {{--  GENERAR HORA USUARIO EXISTENTE  --}}
        function agendar_hora() {

            let url = "{{ route('agenda.agendar_hora') }}";
            let _token = $('#_token').val();
            let fecha_consulta = $('#fecha_consulta').val();
            let reserva_hora_id = $('#reserva_hora_id_paciente').val();
            let id_profesional = $('#agenda_profesional_asistente').val();
            let id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
            let tipo_agenda = $('#id_tipo_agenda').val();
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
                    type: "get",
                    data: {
                        _token: _token,
                        fecha_consulta: fecha_consulta,
                        reserva_hora_id: reserva_hora_id,
                        id_lugar_atencion: id_lugar_atencion,
                        id_profesional: id_profesional,
                        tipo_hora_medica: tipo_agenda_text,
                        representante: representante,
                        acompanante: acompanante,
                        lista_Acompanante: lista_Acompanante,
                        autorizacion_atencion: autorizacion_atencion,
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
                            })
                            $('#reservar_hora').modal('hide');
                            $('#agenda_agregar_paciente').modal('hide');
                        }
                        cargarAgendaProfesional(tipo_agenda, fecha_consulta);

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
                        });
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
                        });

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

            let numero_dir = $('#numero_dir_contacto_emergencia').val();

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

                            $('#agregar_contacto_emergencia').modal('hide');

                            swal({
                                title: "Se Registro Contacto de emergencia de forma correcta",
                                icon: "success",
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
    @yield('btn-script-agenda')
</body>
</html>
