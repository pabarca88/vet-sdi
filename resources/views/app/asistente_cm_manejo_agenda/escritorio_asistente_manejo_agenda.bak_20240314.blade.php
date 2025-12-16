@extends('template.asistente_cm_manejo_agenda.template')

@section('page-styles')
    <link href='{{ asset('css/estilos_boton_agen_examenes.css') }}' rel='stylesheet' />
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
                                                    <option value="{{ $value_pro->id }}">{{ strtoupper($value_pro->nombre) }} {{ strtoupper($value_pro->apellido_uno) }} {{ strtoupper($value_pro->apellido_dos) }}</option>
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
        function cargarAgendaProfesional(tipo_agenda,fecha)
        {

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
                        $('.btn-tipo-agenda').hide();
                        if (data !== 'null')
                        {
                            if(data.estado == 1)
                            {
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

                                /** activar tipos de agendas del profesional */
                                var tipo_agendas_cant = data.tipo_agendas.length;
                                if(tipo_agendas_cant > 0)
                                {
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
                                                if (data != null)
                                                {
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

                                            var valido = 1;
                                            var valido_fecha = 1;
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

                                    $.each(tem_hiddenDays, function(key, value)
                                    {
                                        tem_hiddenDays2.push(parseInt(value));
                                    });

                                    CalendarEl.setOption('hiddenDays',tem_hiddenDays2  );
                                    CalendarEl.setOption('businessHours', data_businessHours );
                                    CalendarEl.setOption('slotMinTime', info_profesional_seleccionado.horario_data.hora_inicio_agenda );
                                    CalendarEl.setOption('slotMaxTime', info_profesional_seleccionado.horario_data.hora_termino_agenda );

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

                            $('#reserva_hora_id_responsable').val('');

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
                        id_lugar_atencion:id_lugar_atencion,
                        tipo_hora_medica: tipo_agenda_text,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        // data = JSON.parse(data);
                        // console.log(data);
                        if(data.estado == 1)
                        {
                            swal({
                                title: "Exito!",
                                text: "Hora medica agendada correctamente",
                                type: "success",
                                confirmButtonText: "Cool"
                            });
                            $('#reservar_hora').modal('hide');
                            $('#agenda_agregar_paciente').modal('hide');
                            cargarAgendaProfesional($('#id_tipo_agenda').val(),fecha_consulta);
                        }
                        else
                        {
                            swal({
                                title: "Hora medica",
                                text: data.msj,
                                type: "error",
                                confirmButtonText: "Cool"
                            });
                        }
                    }
                    else
                    {
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

    </script>
@endsection

@include('app.general.asistente.agenda.boton_flotante_agenda_exa_ciru')
