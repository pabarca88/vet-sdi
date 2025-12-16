{{-- @extends('template.asistente_cm_manejo_agenda.template') --}}
@extends('template.asistente_cm_publico.template')

@section('page-styles')
    <link href='{{ asset('css/estilos_boton_agen_examenes.css') }}' rel='stylesheet' />
    <style>
        .status-circle .circle {
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            display: inline-block;
            border: 2px solid #fff; /* Opcional: Borde blanco para mejor visibilidad */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Opcional: Sombra suave */
        }
    </style>
@endsection

@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header mb-2">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Escritorio confirmación de agenda</h5>
                            </div>
                            {{-- <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('asistentecm.ma.home') }}">Mi escritorio </a>
                                </li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!-- Row Botones -->
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="card-deck">

                        <div class="card subir px-4 py-2">
                            <a href="{{ ROUTE('asistentecm.ma.confirmar_hora') }}">
                                <div class="row d-inline my-auto">
                                    <div class="col-sm-4 d-inline">
                                        <img class="wid-40 mt-0 " src="{{ asset('images/iconos/agenda.svg') }}">
                                    </div>
                                    <div class="col-sm-8 d-inline">
                                        <h5 class="text-left d-inline">Confirmar hora</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="card subir px-4 py-2">
                            <a href="{{ ROUTE('asistentecm.ma.buscar_paciente') }}">

                                <div class="row d-inline my-auto">
                                    <div class="col-sm-4 d-inline">
                                        <img class="wid-40 mt-0 " src="{{ asset('images/iconos/pacientes.svg') }}">
                                    </div>
                                    <div class="col-sm-8 d-inline">
                                        <h5 class="text-left d-inline">Buscar pacientes</h5>
                                    </div>
                                </div>

                            </a>
                        </div>

                        <div class="card subir px-4 py-2">
                            <a href="{{ ROUTE('asistentecm.ma.mis_profesionales') }}">

                                <div class="row d-inline my-auto">
                                    <div class="col-sm-4 d-inline">
                                        <img class="wid-40 mt-40" src="{{ asset('images/iconos/profesionales.svg') }}">
                                    </div>
                                    <div class="col-sm-8 d-inline">
                                        <h5 class="mt-3 text-left d-inline">Profesionales</h5>
                                    </div>
                                </div>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Row Botones-->

            <!-- agenda -->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-body pb-1 mb-1">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 pb-1">
                                    <h5 class="text-c-blue f-14">AGENDA DE PROFESIONALES</h5>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Seleccione Profesional</label>
                                        <select class="form-control form-control-sm" id="agenda_profesional_asistente" name="agenda_profesional_asistente" onchange="cargarAgendaProfesional(1, '');">
                                            <option value="">Seleccione</option>
                                            @if($profesionales)
                                                @foreach($profesionales as $key_pro => $value_pro)
                                                    <option value="{{ $value_pro->id }}" data-id_tipo_agenda="{{ $value_pro->id_tipo_agenda }}">{{ strtoupper($value_pro->nombre) }} {{ strtoupper($value_pro->apellido_uno) }} {{ strtoupper($value_pro->apellido_dos) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 f-12 pb-0" id="tabla_info_profesional" style="display: none;">
                                     <div class="align-middle m-b-25">
                                        <img src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="user image" class="img-radius align-top m-r-15 wid-60" id="img_profesional">
                                        <div class="d-inline-block f-11">
                                            <span>
                                                <strong id="nombre_profesional_agenda"></strong>
                                            </span><br>
                                            <span id="especialidad_porfesional_agenda"></span>
                                            <button type="button" class="btn btn-info-light-c btn-xxxs" id="btn_ver_info_profesional_seleccionado"  onclick=""><i class="feather icon-plus"></i> Más información</button>
                                            @include('general.bloqueo_hora.bloque_hora_asistente')
                                            @include('general.anular_hora.anular_hora_asistente')
                                            <span class="status active"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 pb-0" id="seccion_agenda_botones" style="display: none;">
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs" id="btn_ver_lista_espera_profesional_seleccionado" onclick="lista_espera();" ><i class="feather icon-external-link"></i> Ver lista de Espera</button>
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs " id="btn_ver_agregar_hora_extra" onclick="abrir_horas_extras()"; ><i class="feather icon-external-link"></i> Ver Horas extras</button>
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs " id="btn_ver_agregar_hora_examen" onclick="abrir_horas_examen()"; ><i class="feather icon-external-link"></i>  Ver horas examenes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion_agenda_agendas" style="display: none;">
                    <input type="hidden" name="agenda_lugar_atencion_asistente" id="agenda_lugar_atencion_asistente" value="{{ $lugares_atencion->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-c-blue my-1" style="font-size: 1.1rem;" id="titulo_tipo_agenda"></h5>
                                </div>
                            </div>
                            <div id='agenda'></div>
                        </div>
                    </div>
                </div>

            </div>
            <!--Cierre: agenda -->
        </div>
    </div>
    <!--Cierre: Container Completo-->
    <!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_profesional" id="id_profesional" value="">
@endsection

@section('modales')
    @include('app.asistente_cm_manejo_agenda.modales.modal_profesional_informacion')

    @include('general.asistentes.modal_consulta_agenda')

    @include('app.asistente_cm_manejo_agenda.modales.lista_espera')

    {{-- horas extras --}}
    @include('app.asistente_cm_manejo_agenda.modales.horas_extras')
    @include('app.asistente_cm_manejo_agenda.modales.horas_extras_agendar')

    {{-- hora examen --}}
    @include('app.general.asistente.reserva_hora_examen.horas_examen')
    @include('app.general.asistente.reserva_hora_examen.horas_examen_agendar')

    {{-- transcribir examen por asistente --}}
    @include('app.asistente_cm_manejo_agenda.modales.transcribir_examen');
@endsection


@section('page-script')
    <script src="{{ asset('js/jQuery-Mask-Plugin-master/jquery.mask.js') }}"></script>
    <script>

        var CalendarEl = null;
        $(document).ready(function()
        {
            $('#agenda_profesional_asistente').select2();

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

        });

        function cerrar_modal_infoProf() {
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
            let url = "{{ route('asistentecm.ma.buscar_info_profesional') }}";
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
        var activeDaysInRange = [];
        function cargarAgendaProfesional(tipo_agenda,fecha)
        {
            var tipo_agenda_temp = $('#agenda_profesional_asistente option:selected').attr('data-id_tipo_agenda');

            if(tipo_agenda_temp != 0)
                tipo_agenda = tipo_agenda_temp;


            console.log('asistente_cm_manejo_agenda/escritorio_asistente_manejo_agenda');
            if(fecha != undefined && fecha != '')
            {
                var res = fecha.split('T')[0];
                fecha = res;
            }
            else
            {
                fecha = '{{ date("Y-m-d") }}';
            }

            var evaluacion = false;

            var id_lugar_atencion = $('#agenda_lugar_atencion_asistente').val();
            var id_profesional = $('#agenda_profesional_asistente').val();
            let url1 = "{{ route('agenda.buscar_info_profesional') }}";

            if(id_profesional != '')
            {
                $.ajax({
                    url: url1,
                    type: "GET",
                    data: {
                        id_profesional: id_profesional,
                        id_lugar_atencion: id_lugar_atencion,
                        tipo_agenda: tipo_agenda,
                    },
                    success:function(data){
                        $('.boton').hide();
                        if (data !== 'null')
                        {
                            if(data.estado == 1)
                            {
                                $('.boton').css('background-color','#8b52c2');
                                $('.btn-agenda-'+tipo_agenda).css('background-color','#1cbebe');
                                $('#id_tipo_agenda').val(tipo_agenda);
                                $('#id_profesional').val(data.profesional.id);

                                if (data.profesional.id_especialidad == 2) {
                                    console.log('dentista');
                                    $('#link_pago_presupuesto_dental').removeClass('d-none');

                                } else {
                                    console.log('general');
                                    $('#link_pago_presupuesto_dental').addClass('d-none');
                                    $('#pills-venta-dental').removeClass('show active');
                                }

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

                                /** activar tipos de agendas del profesional */
                                var tipo_agendas_cant = data.tipo_agendas.length;
                                if(tipo_agendas_cant > 0)
                                {
                                    $.each(data.tipo_agendas, function (key, value)
                                    {
                                        carga_tipos_agendas(data.tipo_agendas);
                                        carga_tipos_agendas_anular(data.tipo_agendas);
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
                                    CalendarEl = new FullCalendar.Calendar(calendarEl, {
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
                                                    id_profesional: id_profesional
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
                                                            console.log('adios');
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
                                                console.log(data);
                                                if (data != null)
                                                {
													$('#modal_consulta_mensaje').text('');
                                                    $('#reserva_hora_id_paciente_asistente').val(data.paciente.id);
                                                    $('#datos_consulta_rut').text(data.paciente.rut);
                                                    $('#datos_consulta_nombre').text(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                    $('#input_reserva_hora_nombre_asistente').val(data.paciente.nombres);
                                                    $('#input_reserva_hora_apellido_uno_asistente').val(data.paciente.apellido_uno);
                                                    $('#input_reserva_hora_apellido_dos_asistente').val(data.paciente.apellido_dos);
                                                    $('#datos_consulta_edad').text(data.paciente.fecha_nac);
                                                    $('#input_reserva_fecha_nacimiento_asistente').val(data.paciente.fecha_nac);
                                                    $('#datos_consulta_email').text(data.paciente.email);
                                                    $('#input_reserva_hora_email_asistente').val(data.paciente.email);
                                                    $('#datos_consulta_telefono').text(data.paciente.telefono_uno);
                                                    $('#input_reserva_hora_telefono_asistente').val(data.paciente.telefono_uno);

                                                    if (data.paciente.sexo == 'M') {
                                                        $('#datos_consulta_sexo').text('Masculino');
                                                        $('#input_reserva_sexo_asistente').val('M');
                                                    } else {
                                                        $('#datos_consulta_sexo').text('Femenino');
                                                        $('#input_reserva_sexo_asistente').val('F');
                                                    }

                                                    let tratamientos = data.paciente.presupuestos;
                                                    $('#tratamientos_dentales').empty();
                                                    if(tratamientos.length > 0){
                                                        tratamientos.forEach(t => {
                                                            $('#tratamientos_dentales').append('<option>'+t.id+') de fecha '+t.fecha+' </option>');
                                                        });
                                                    }else{
                                                        $('#tratamientos_dentales').append('<option>Primera consulta </option>');
                                                        $('#tratamientos_dentales').append('<option>Urgencia </option>');
                                                    }


                                                    $('#estado_id_profesional').val(data.profesional.id);
                                                    $('#estado_id_paciente').val(data.paciente.id);
                                                    $('#id_hora_medica').val(id_hora_medica);

													console.log('carga datos');
													console.log(data);
													if(data.paciente?.["direccion"] !== undefined)
													{
														$('#datos_consulta_direcion').html(data.paciente.direccion.direccion);
														$('#input_reserva_hora_direccion_asistente').val(data.paciente.direccion.direccion);
														$('#datos_consulta_numero').html(data.paciente.direccion.numero_dir);
														$('#input_reserva_hora_numero_asistente').val(data.paciente.direccion.numero_dir);
														$('#datos_consulta_region').html(data.paciente.direccion.region.nombre);
														$('#input_reserva_hora_region_asistente').val(data.paciente.direccion.ciudad.id_region);
														$('#datos_consulta_ciudad').html(data.paciente.direccion.ciudad.nombre);
														buscar_ciudad_general('input_reserva_hora_ciudad_asistente', 'input_reserva_hora_region_asistente', data.paciente.direccion.ciudad.id);
														// $('#input_reserva_hora_ciudad_asistente').val(data.paciente.direccion.ciudad.id);
													}
													else
													{
														$('#datos_consulta_direcion').html('no registrado');
														$('#input_reserva_hora_direccion_asistente').val('');
														$('#datos_consulta_numero').html('no registrado');
														$('#input_reserva_hora_numero_asistente').val('');
														$('#datos_consulta_region').html('no registrado');
														$('#input_reserva_hora_region_asistente').val('');
														$('#datos_consulta_ciudad').html('no registrado');
														$('#input_reserva_hora_ciudad_asistente').val('');
													}

                                                    //celeste
                                                    //Reservada
                                                    if (data.estado_hora == 1 || data.estado_hora == 16) //else if (info.event.backgroundColor == '#FEAA32')
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


                                                        console.log(data.estado_hora);
                                                        console.log(data.paciente.id_direccion);
                                                        console.log(data.paciente.fecha_nac);

                                                        if(data.estado_hora == 16)
                                                        {
                                                            $('#modal_consulta_mensaje').text('DEBE COMPLETAR LOS DATOS DEL PACIENTE PARA CONFIRMAR HORA');
                                                            // if(data.paciente.id_direccion == 'null' || data.paciente.fecha_nac == 'null')
                                                            if( data.paciente.id_direccion == 'null' || data.paciente.id_direccion == null || data.paciente.id_direccion == '')
                                                            {
                                                                $('#hm_anular_hora').attr('disabled', 'disabled');
                                                                $('#hm_confirmar_hora').attr('disabled', 'disabled');
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $('#hm_anular_hora').removeAttr('disabled');
                                                            $('#hm_confirmar_hora').removeAttr('disabled');
                                                        }

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

                                                        /** PESTAÑA DE RECIBIR PAGO */
                                                        $('#bono_paciente_rut').val(data.paciente.rut);
                                                        $('#bono_paciente_rut_dental').val(data.paciente.rut);
                                                        $('#bono_paciente_nombre').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#bono_paciente_nombre_dental').val(data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                                                        $('#bono_profesional_nombre').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                        $('#bono_profesional_nombre_dental').val(data.profesional.nombre+' '+data.profesional.apellido_uno+' '+data.profesional.apellido_dos);
                                                        $('#bono_profesional_rut').val( data.profesional.rut);
                                                        $('#bono_profesional_rut_dental').val( data.profesional.rut);
                                                        $('#bono_hora_medica').val(info.event.id);
                                                        $('#bono_id_profesional').val(data.profesional.id);
                                                        $('#bono_id_paciente').val(data.paciente.id);
                                                        $('#bono_prevision').val(data.paciente.id_prevision);
                                                        $('#bono_prevision_txt').val( $('#bono_prevision option:selected').text() );

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

                                                        abrir_transcripcion_examen(id_hora_medica);
                                                        // $('#cabecera_hora_medica').text('Datos Del Paciente');
                                                        // $('#consulta').modal('show');


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

                                                }
                                                else
                                                {
                                                    swal({
                                                        title: "Paciente no encontrado en el sistema",
                                                        icon: "error",
                                                        buttons: "Aceptar",
                                                        DangerMode: true,
                                                    });
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
                                            console.log('especialidad del profesional : '+data.profesional.id_especialidad);
                                            $('#contenedor_procedimientos_presupuesto').empty();
                                            if(data.profesional.id_especialidad == 2){
                                                $('#contenedor_procedimientos_presupuesto').append(`
                                                    <div class="col-sm-12" id="div_procedimiento" style="display:  none;">
                                                        <div class="form-group fill">
                                                            <label class="floating-label-activo-sm">Seleccione opción o N° de presupuesto</label>
                                                            <select class="form-control form-control-sm" name="presupuesto_numero"
                                                                id="presupuesto_numero" onchange="updateTotalValue()">
                                                            </select>
                                                        </div>
                                                        <div id="contenedor_tratamientos_presupuesto"></div>
                                                    </div>`);
                                            }else if(data.profesional.id_especialidad == 4 && data.profesional.id_tipo_especialidad == 55){
                                                $('#contenedor_procedimientos_presupuesto').append(`
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="div_procedimiento" name="div_procedimiento" style="display: none;">

                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Procedimiento</label>
                                                            <select class="form-control form-control-sm" name="form_reseva_de_horas_id_procedimiento" id="form_reseva_de_horas_id_procedimiento">
                                                                <option value="">Seleccione</option>
                                                                @if (isset($procedimientos) && !empty($procedimientos))
                                                                    @foreach ($procedimientos as $proced )
                                                                        <option value="{{ $proced->id }}" data-cant_bloque="{{ (empty($proced->cantidad_bloques_prof)?$proced->cantidad_bloques:$proced->cantidad_bloques_prof) }}">{{ $proced->nombre }} {{ (empty($proced->cantidad_bloques_prof)?$proced->cantidad_bloques:$proced->cantidad_bloques_prof) }}Blq.</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>

                                                    </div>`);
                                            }else{
                                                $('#contenedor_procedimientos_presupuesto').append(``);
                                            }
                                            var valido = 1;
                                            var valido_fecha = 1;
                                            /** VALIDACION DE FUERA DE HORARIO */
                                            // $.each(date.jsEvent.path, function(index, value)
                                            // $.each(date.jsEvent.srcElement.classList, function(index, value)
                                            // {
                                            //     console.log(value);
                                            //     if(value == 'fc-non-business')
                                            //     {
                                            //         swal({
                                            //             title: "Toma de Hora",
                                            //             text: "Horario no disponible con el Profesional",
                                            //             icon: "error",
                                            //             buttons: "Aceptar",
                                            //             DangerMode: true,
                                            //         })
                                            //         valido = 0;
                                            //     }

                                            // });

                                            if(valido == 1)
                                            {

                                                {{--  console.log(date.date);  --}}
                                                {{--  console.log(date.dateStr);  --}}
                                                var date_str = date.dateStr.replace('T',' ');
                                                var date_DD = new Date(date_str);
                                                var curr_date = date_DD.getDate();
                                                var curr_month = date_DD.getMonth();
                                                var curr_year = date_DD.getFullYear();
                                                var curr_hour = date_DD.getHours();
                                                var curr_mint = date_DD.getMinutes();
                                                var fecha_seleccionada = curr_year+"-"+curr_month+"-"+curr_date+" "+curr_hour+":"+curr_mint;
                                                // $.each(CalendarEl.getEvents(), function( index, value ) {
                                                //     var date_str2 = value.startStr.replace('T',' ');
                                                //     var date_DD2 = new Date(date_str2);
                                                //     var curr_date2 = date_DD2.getDate();
                                                //     var curr_month2 = date_DD2.getMonth();

                                                //     var curr_year2 = date_DD2.getFullYear();
                                                //     var curr_hour2 = date_DD2.getHours();
                                                //     var curr_mint2 = date_DD2.getMinutes();
                                                //     var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;

                                                //     if($.trim(fecha_seleccionada) == $.trim(fecha_evento))
                                                //     {
                                                //         valido = 0;
                                                //     }
                                                // });

                                                // /** VALIDAR BLOQUEO */
                                                // CalendarEl.getEvents().forEach(function(event) {
                                                //     var eventEnd = typeof event.end === 'string' ? moment(event.end) : event.end;
                                                //     if (date.date >= event.start && date.date <= eventEnd) {
                                                //         valido = 0;
                                                //         console.log('Existe un evento en esta fecha: ' + event.title);
                                                //         console.log(date.date);
                                                //         console.log(event.start);
                                                //         console.log(eventEnd);

                                                //         swal({
                                                //             title: "Toma de Hora",
                                                //             text: "El profesional no atiende en este periodo.",
                                                //             icon: "error",
                                                //             buttons: "Aceptar",
                                                //             DangerMode: true,
                                                //         });
                                                //         return false;
                                                //     }

                                                // });

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
                                                        });
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
                                                    });
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

                                    $.each(tem_hiddenDays, function(key, value)
                                    {
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
                            $('#agenda').html('');
                            $('#titulo_tipo_agenda').html('');
                            $('#tabla_info_profesional').hide();
                            $('#seccion_agenda_botones').hide();
                            $('#seccion_agenda_agendas').hide();
                        }
                    }
                });
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

                    cargarAgendaProfesional($('#id_tipo_agenda').val(),'');


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

        {{-- BUSCAR PACIENTE --}}
        function buscar_paciente() {

            $('#div_cargando').show();
            $('#div_boton_buscar_paciente').hide();

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

            $('#prereserva_hora_nombres_paciente').val('');
            $('#prereserva_hora_apellido_uno').val('');
            $('#prereserva_hora_apellido_dos').val('');
            $('#prereserva_hora_correo').val('');
            $('#prereserva_hora_telefono_uno').val('');

            let rut = $('#rut_paciente_reserva').val();
            $('#reserva_agregar_paciente_hora').hide();
            $('#reserva_datos_paciente').hide();
            let url = "{{ route('agenda.buscar_rut_paciente') }}";
            if(rut != '')
            {
                $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        rut: rut,
                        id_profesional: $('#id_profesional').val(),
                    },
                })
                .done(function(data) {
                    console.log(data);
					$('#div_cargando').hide();
					$('#div_boton_buscar_paciente').show();

                    console.log(JSON.parse(data));

                    if (data !== 'null') {
                        data = JSON.parse(data);
                        if(data.tipo_paciente == 'SI')
                        {
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

                            $('#reserva_hora_nombre').text(data.nombres + ' ' + data.apellido_uno + ' ' + data.apellido_dos);
                            $('#input_reserva_hora_nombre').val(data.nombres);
                            $('#input_reserva_hora_apellido_uno').val(data.apellido_uno);
                            $('#input_reserva_hora_apellido_dos').val(data.apellido_dos);

                            $('#reserva_fecha_nacimiento').text(data.fecha_nac);
                            $('#input_reserva_fecha_nacimiento').val(DateFormatVista(data.fecha_nac));

                            $('#reserva_fecha_ultima').html(data.fecha_ultima_atencion);

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

                            $('#div_procedimiento').css('display','block');

                            $('#reserva_direccion').text(data.direccion.direccion+' '+data.direccion.numero_dir+', '+data.direccion.ciudad.nombre);
                            $('#input_reserva_direccion_direccion').val(data.direccion.direccion);
                            $('#input_reserva_direccion_numero_dir').val(data.direccion.numero_dir);

                            $('#input_reserva_direccion_region').val(data.direccion.ciudad.id_region);
                            // $('#input_reserva_direccion_ciudad_agregar').val(data.direccion.ciudad.id);
                            buscar_ciudad_general('input_reserva_direccion_region', 'input_reserva_direccion_ciudad', data.direccion.ciudad.id);


                            $('#rut_paciente_reserva').val('');
                            $('.div_rut_buscar').hide();

                            $('#reserva_hora_edad').val(data.edad);

                            $('#id_lugar_atencion').val($('#agenda_lugar_atencion_asistente').val());
                            if(data.presupuestos){
                                console.log(data.presupuestos.length);
                                if(data.presupuestos.length > 0){
                                    $('#presupuesto_numero').append('<option>Seleccione el presupuesto </option>');
                                    data.presupuestos.forEach(p => {
                                        $('#presupuesto_numero').append(`<option value="${p.id}" data-total="${p.valor_total}">${p.id} - ${p.fecha}</option>`);
                                    });
                                }else{
                                    $('#presupuesto_numero').append(`<option value="0">Primera consulta</option>`);
                                    $('#presupuesto_numero').append(`<option value="u">Urgencia</option>`);

                                }
                            }
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

                            if(data?.["direccion"] !== undefined)
                            {
                                $('#region_agregar').val(data.direccion.ciudad.id_region);
                                buscar_ciudad(data.direccion.id_ciudad);
                                $('#reserva_hora_direccion').val(data.direccion.direccion);
                                $('#reserva_hora_numero_dir').val(data.direccion.numero_dir);
                            }

                            $('#reserva_hora_telefono_uno').val(data.telefono_uno);

                            $('#reserva_hora_id_responsable').val('');

                            {{--
                            $('#reserva_hora_profesion').val();
                            $('#reserva_hora_convenio').val();
                            $('#reserva_hora_descripcion').val();
                            --}}

                            console.log('INFORMACION DE PRE RESERVA');
                            console.log(data);
                            // INFORMACION DE PRE RESERVA
                            $('#prereserva_hora_nombres_paciente').val(data.nombres);
                            $('#prereserva_hora_apellido_uno').val(data.apellido_uno);
                            $('#prereserva_hora_apellido_dos').val(data.apellido_dos);
                            $('#prereserva_hora_correo').val(data.email);
                            $('#prereserva_hora_telefono_uno').val(data.telefono_uno);
                        }
                    } else {
                        $('#reserva_datos_paciente').hide();
                        $('#reserva_agregar_paciente_hora').show();

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else
            {
                swal({
                    title: "Buscar Paciente",
                    text: 'Debe ingresar RUT para buscar.',
                    icon: "error",
                });

                $('#div_cargando').hide();
                $('#div_boton_buscar_paciente').show();
            }
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

        // Función para actualizar el input de valor total
        function updateTotalValue() {
            const selectedOption = $('#presupuesto_numero option:selected'); // Obtener la opción seleccionada
            let url = "{{ ROUTE('profesional.mi_agenda.dame_tratamientos_presupuesto') }}";
            let id_presupuesto = selectedOption.val();

            $.ajax({
                type:'post',
                url: url,
                data:{
                    id: id_presupuesto,
                    _token: CSRF_TOKEN
                },
                success: function(resp){
                    console.log(resp);
                    let tratamientos = resp.tratamientos;
                    let maxilar_superior_gral_diagnosticos = resp.maxilar_superior_gral_diagnosticos;
                    let maxilar_superior_gral_tratamientos = resp.maxilar_superior_gral_tratamientos;
                    let maxilar_superior_gral_diagnosticos_endo = resp.maxilar_superior_gral_diagnosticos_endo;
                    let maxilar_superior_gral_tratamientos_endo = resp.maxilar_superior_gral_tratamientos_endo;
                    let maxilar_inferior_gral_diagnosticos = resp.maxilar_inferior_gral_diagnosticos;
                    let maxilar_inferior_gral_tratamientos = resp.maxilar_inferior_gral_tratamientos;
                    let maxilar_inferior_gral_diagnosticos_endo = resp.maxilar_inferior_gral_diagnosticos_endo;
                    let maxilar_inferior_gral_tratamientos_endo = resp.maxilar_inferior_gral_tratamientos_endo;
                    let boca_completa_gral_diagnosticos = resp.boca_completa_gral_diagnosticos;
                    let boca_completa_gral_tratamientos = resp.boca_completa_gral_tratamientos;
                    let boca_completa_gral_diagnosticos_endo = resp.boca_completa_gral_diagnosticos_endo;
                    let boca_completa_gral_tratamientos_endo = resp.boca_completa_gral_tratamientos_endo;
                    const totalValue = selectedOption.data('total') || ''; // Obtener el valor del atributo data-total
                    var bloques = resp.bloques;
                    $('#bono_valor_consulta').val(totalValue); // Actualizar el input de valor total
                    $('#contenedor_tratamientos_presupuesto').show();
                    $('#contenedor_tratamientos_presupuesto').empty();
                    tratamientos.forEach(t => {

                        const checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        const disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked)" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">N° Pieza ${t.pieza} - ${t.tratamiento}</label>
                            </div>`);


                    });
                    maxilar_superior_gral_diagnosticos.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar superior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    maxilar_superior_gral_tratamientos.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar superior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    maxilar_superior_gral_diagnosticos_endo.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar superior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    maxilar_superior_gral_tratamientos_endo.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar superior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    maxilar_inferior_gral_diagnosticos.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar inferior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    maxilar_inferior_gral_tratamientos.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar inferior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    maxilar_inferior_gral_diagnosticos_endo.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar inferior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    maxilar_inferior_gral_tratamientos_endo.forEach(t => {
                        if(t.presupuesto == 1){
                        var checked = t.atendido == 1 ? 'checked' : ''; // Si está atendido, agrega 'checked'
                        var disabled = t.atendido == 1 ? 'disabled' : ''; // Agregar 'disabled' si está atendido

                            $('#contenedor_tratamientos_presupuesto').append(`
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tratamiento${t.id}" onclick="handleCheckboxClick(${t.id}, this.checked,'gral')" ${checked}>
                                <label class="form-check-label" for="tratamiento${t.id}">Maxilar inferior ${t.diagnostico_tratamiento}</label>
                            </div>`);
                            }
                    });
                    $('#contenedor_tratamientos_presupuesto').append('Se utilizan <span id="cantidad_bloques_atencion">'+bloques+'</span> bloques de atención.');
                },
                error: function(error){
                    console.log(error);
                }
            });

        }
        function handleCheckboxClick(id, isChecked, tipo = null) {
            console.log(`Checkbox con ID ${id} está ${isChecked ? 'seleccionado' : 'deseleccionado'}`);

            // Aquí puedes manejar la lógica adicional o enviar el ID al servidor
            $.ajax({
                url: '{{ ROUTE("profesional.mi_agenda.atender_tratamiento_presupuesto") }}',
                method: 'POST',
                data: { id: id, checked: isChecked,tipo: tipo, _token: CSRF_TOKEN },
                success: function(response) {
                    console.log('Servidor respondió:', response);
                    let bloques_actualizados = response.bloques;
                    let bloques_original = parseInt($('#cantidad_bloques_atencion').text());
                    let bloques = response.atendido == 1 ? bloques_original + bloques_actualizados : bloques_original - bloques_actualizados;
                    if(bloques < 0) bloques = 0;
                    $('#cantidad_bloques_atencion').html(bloques);
                },
                error: function(error) {
                    console.error('Error al enviar datos:', error);
                }
            });
        }

        {{--  REGISTRO NUEVO PACIENTE GENERACION DE HORA  --}}
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
                            text: "Debe ingresar el email o teléfono",
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
                            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
                            if (caract.test(reserva_hora_email) == false){
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
                                if(reserva_hora_representante_result_codigo_validacion =='0')
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

        function agendar_hora_paciente_nuevo_prereserva()
        {

            let fecha_consulta = $('#fecha_consulta').val();

            /** validacion para estados 16 pre reserva */
            valido = 1;
            var lista_horas = [];
            $.each(CalendarEl.getEvents(), function( index, value ) {
                var date_str2 = value.startStr.replace('T',' ');
                var date_DD2 = new Date(date_str2);
                var curr_date2 = date_DD2.getDate();
                var curr_month2 = date_DD2.getMonth();
                var curr_year2 = date_DD2.getFullYear();
                var curr_hour2 = date_DD2.getHours();
                var curr_mint2 = date_DD2.getMinutes();
                var fecha_evento = curr_year2+"-"+curr_month2+"-"+curr_date2+" "+curr_hour2+":"+curr_mint2;

                var date_DD3 = new Date(fecha_consulta);
                var curr_date3 = date_DD3.getDate();
                var curr_month3 = date_DD3.getMonth();
                var curr_year3 = date_DD3.getFullYear();
                var curr_hour3 = date_DD3.getHours();
                var curr_mint3 = date_DD3.getMinutes();
                var fecha_consulta3 = curr_year3+"-"+curr_month3+"-"+curr_date3+" "+curr_hour3+":"+curr_mint3;

                // console.log(fecha_consulta3);
                // console.log(fecha_evento);
                // console.log('**********');

                if($.trim(fecha_consulta3) == $.trim(fecha_evento))
                {
                    console.log(value.id);
                    lista_horas.push(value.id);
                }
            });



            console.log( 'agendar_hora_paciente_nuevo_prereserva' );
            console.log( valido );
            // return false;


            let url = "{{ route('agenda.agendar_hora_nuevo_paciente_prereserva') }}";
            let _token = $('#_token').val();

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

            let reserva_hora_nombre = $('#prereserva_hora_nombres_paciente').val();
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

            let reserva_hora_primer_apellido = $('#prereserva_hora_apellido_uno').val();
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

            let reserva_hora_segundo_apellido = $('#prereserva_hora_apellido_dos').val();
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

            let reserva_hora_email = $('#prereserva_hora_correo').val();
            let reserva_hora_telefono_uno = $('#prereserva_hora_telefono_uno').val();

            if(reserva_hora_email == '' && reserva_hora_telefono_uno =='')
            {
                swal({
                    title: "Error!",
                    text: "Debe email de contacto o telefono",
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

            console.log('ajax');
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
                    reserva_hora_email: reserva_hora_email,
                    reserva_hora_telefono: reserva_hora_telefono_uno,
                    reserva_hora_confirmacion: reserva_hora_confirmacion,
                    reserva_hora_sms: reserva_hora_sms,
                    id_profesional:id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                    tipo_hora_medica: tipo_agenda_text,
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
                console.log('error');
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
            var procedimiento = '';
            var proc_bloque = '';
            if($('#form_reseva_de_horas_id_procedimiento').length == 1)
            {
                procedimiento = $('#form_reseva_de_horas_id_procedimiento').val();
                proc_bloque = $('#form_reseva_de_horas_id_procedimiento option:selected').attr('data-cant_bloque');
            }else{
                proc_bloque = parseInt($('#cantidad_bloques_atencion').text());
            }

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
                        procedimiento: procedimiento,
                        proc_bloque: proc_bloque
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
                    })
                    // alert('No se pudo Cargar las ciudades');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };

        function buscar_ciudad_general(input_region, input_ciudad, id_ciudad=0)
        {
            console.log(input_region);
            console.log(input_ciudad);
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

        function validar_tipo_hora_medica(id)
        {
            let url = "{{ route('agenda.buscar_hora_medica') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_hora_medica: id,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null)
                {

                    if(data.estado == 1)
                    {
                        if(data.estado_hora == 16)
                        return 1;
                        else
                        return 0;
                    }
                    else
                    {
                        return 0;
                        console.log('error validacion');
                    }

                }
                else
                {
                    return 0;
                    console.log('error validacion');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

    </script>
@endsection

@include('app.general.asistente.agenda.boton_flotante_agenda_exa_ciru')
