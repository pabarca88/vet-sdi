@extends('template.laboratorio.laboratorio_asistente.template')

@section('page-styles')
    <link href='{{ asset('js/fullcalendar-5.10.1/lib/main.css') }}' rel='stylesheet' />

    <style>
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

        .fc-timegrid-event .fc-event-time{
            font-size: 1rem!important;
        }

        .fc-v-event .fc-event-title{
            font-size: 0.9rem!important;
        }

        /* kill the horizontal border/padding used to compensate for scrollbars */
        .fc-row {
            border: 0 !important;
            margin: 0 !important;
        }

        .fc .fc-timegrid-slot {
            height: 5em!important;
        }

        .fc-timegrid-event-harness > .fc-timegrid-event {
          /* height:6em; */
		}

        .fc .fc-toolbar-title {
            font-size: 1.4em;
            margin: 0;
        }

        .fc .fc-toolbar.fc-header-toolbar {
            margin-bottom: 0px!important;
        }

        .btn-group>.btn,
        .btn-group-vertical>.btn {
            position: relative;
            flex: 1 1 auto;
            padding: 5px 5px;
            font-size: 0.8rem;
        }

        .fc-today-button{
            padding: 5px 5px;
            font-size: 0.8rem;
        }

         .btn.btn-agenda {
            width: 38px !important;
            height: 38px !important;
            font-size: 22px !important;
            padding: 0px;
            border-radius: 50%!important;
        }

        @media (max-width: 767.98px) {

            .t-lugar-aten{
                font-size:0.9rem!important;
            }

            .t-tipo-agenda {
                font-size:0.94rem!important;
            }

             .btn.btn-agenda {
                width: 30px !important;
                height: 30px !important;
                font-size: 15px !important;
                padding: 0px;
                border-radius: 50%!important;
            }

            .fc .fc-toolbar-title {
            font-size: 1rem!important;
            margin: 0;
            }

             .btn-group>.btn,
            .btn-group-vertical>.btn {
                position: relative;
                flex: 1 1 auto;
                padding: 1px 5px;
                font-size: 0.8rem;
            }

        }
    </style>

    <link href='{{ asset('css/estilos_boton_agen_examenes.css') }}' rel='stylesheet' />
@endsection

@section('content')

  <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Agenda</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="escritorio_asistente_cm.php" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="agenda_laboratorios_asistentes_cm.php">Agenda</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <!--Pacientes y pagos-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <p class="f-18 d-inline text-white">
                                    <span><strong>Laboratorio:&nbsp;&nbsp;</strong></span><!--Nombre del Laboratorio--><span>Laboratorio Clínico</span><!--Tipo de Laboratorio-->
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 mr-5 px-4 card">
                                    <div id='agenda'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->


@endsection

@section('page-script')
    <script>
        $(document).ready(function () {
            // var calendarEl = document.getElementById('agenda');
            // var CalendarEl = new FullCalendar.Calendar(calendarEl, {
            //     droppable: false,
            //     editable: false,
            //     locale: "es",
            //     timeZone: 'local',
            //     initialDate: '2025-02-05',
            //     initialView: 'timeGridWeek',
            //     themeSystem: 'bootstrap',
            //     slotDuration: '00:15:00',
            //     headerToolbar: {
            //         //start: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek', // will normally be on the left. if RTL, will be on the right
            //         //center: 'title',
            //         //end: 'today prev,next'
            //         start: 'prev,next today',
            //         center: 'title',
            //         // right: 'timeGridWeek,listWeek'
            //         right: 'timeGridWeek,listWeek'
            //     },
            //     weekends: true,
            //     nowIndicator: true,
            //     selectable: true,
            //     //dayMaxEvents: true,
            //     titleFormat: {
            //         year: 'numeric',
            //         month: 'numeric',
            //         day: 'numeric'
            //     },
            //     allDaySlot: false,
            //     expandRows: true,
            //     slotEventOverlap: false,

            //     selectConstraint: "businessHours",
            //     slotLabelFormat: {
            //         hour: 'numeric',
            //         minute: '2-digit',
            //         omitZeroMinute: false,
            //         meridiem: 'medium'
            //     },
            //     eventDidMount: function(info) {
            //         {{--   console.log(info.el);  --}}
            //         $(info.el).tooltip({
            //             title: info.event.extendedProps.description,
            //             placement: "top",
            //             trigger: "hover",
            //             container: "body"
            //         });
            //     },

            //     events: function(start, end, callback){
            //             var arrayTemp = [];
            //             arrayTemp.push({
            //                 id: 1,
            //                 title: 'Octavo Par',
            //                 description: 'E - Johan Davila' ,
            //                 start: '2025-02-05T13:00:01',
            //                 end: '2025-02-05T14:00:00',
            //                 // backgroundColor: element.estado.color
            //             });
            //             end(arrayTemp);

            //     },

            //     eventClick: function(info) {
            //         window.location.href = "{{ route('laboratorio.ver.ficha.atencion.orl') }}";
            //     },

            //     selectOverlap: function(event) {
            //         {{--  console.log(event);  --}}
            //         return event.rendering === 'background';
            //     },

            //     dateClick: function(date, jsEvent, view) {

            //         swal({
            //             title: "Toma de Hora",
            //             text: "Horario no disponible con el Profesional",
            //             icon: "error",
            //             buttons: "Aceptar",
            //             DangerMode: true,
            //         });
            //     },
            //     eventDrop: function(info) {
            //         {{--  console.log(info);  --}}
            //         return false;
            //     },
            // });
            // CalendarEl.render();

            var Calendar = FullCalendar.Calendar;
            var calendarEl = document.getElementById('agenda');
            var calendar = new Calendar(calendarEl, {
                droppable: false,
                editable: false,
                locale: "es",
                timeZone: 'local',
                // initialDate: '2025-02-05',
                initialView: 'timeGridWeek',
                themeSystem: 'bootstrap',
                slotDuration: '00:30:00',
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
                dayMaxEvents: true,
                titleFormat: {
                    year: 'numeric',
                    month: 'numeric',
                    day: 'numeric'
                },
                allDaySlot: false,
                // expandRows: true,
                // slotEventOverlap: false,

                selectConstraint: "businessHours",
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: false,
                    meridiem: 'medium'
                },
                events:[
                    {
                    title: 'E - Johan Davila - Octavo Par',
                    start: '2025-02-05T08:00:01.008',
                    end: '2025-02-05T09:00:00.008'
                    }
                ],
                eventClick: function(info) {
                    window.location.href = "{{ route('laboratorio.ver.ficha.atencion.orl') }}";
                },
            });

            // var data_businessHours = [];
            // data_businessHours.push({
            //     'daysOfWeek': 0 ,
            //     'startTime': '08:00:01',
            //     'endTime': '22:00:00'
            // });
            // data_businessHours.push({
            //     'daysOfWeek': 2 ,
            //     'startTime': '08:00:01',
            //     'endTime': '22:00:00'
            // });
            // data_businessHours.push({
            //     'daysOfWeek': 3 ,
            //     'startTime': '08:00:01',
            //     'endTime': '22:00:00'
            // });
            // data_businessHours.push({
            //     'daysOfWeek': 4 ,
            //     'startTime': '08:00:01',
            //     'endTime': '22:00:00'
            // });
            // data_businessHours.push({
            //     'daysOfWeek': 5 ,
            //     'startTime': '08:00:01',
            //     'endTime': '22:00:00'
            // });

            calendar.setOption('hiddenDays', '6' );
            // calendar.setOption('businessHours', data_businessHours );

            calendar.setOption('slotMinTime', '08:00:01' );
            calendar.setOption('slotMaxTime', '22:00:00' );

            calendar.render();
        });
    </script>
@endsection
