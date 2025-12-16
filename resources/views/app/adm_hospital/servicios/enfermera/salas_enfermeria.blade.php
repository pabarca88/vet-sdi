@extends('template.hospitales.template')
@section('style')
<style>
    .red-background {
        background-color: #ff5353;
        transition: background-color 1s;
    }

    .white-background {
        background-color: white;
        transition: background-color 1s;
    }

    .cama-cubo{
        width: 100%;
        border: 1px solid black;
        padding: 10px;
        background: #eee;
    }
    .image_paciente{
        width: 50px;
    }
</style>
@endsection


@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content m-top">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center pt-2">
                    <div class="col-md-12">
                        <div class="page-header-title d-inline">
                            <p class="font-italic mt-0 mb-0 text-white d-inline float-right">
                            @php
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $fecha = \Carbon\Carbon::parse(now());
                            $mes = $meses[($fecha->format('n')) - 1];
                            $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                            @endphp
                            {{ $fecha }}
                            </p>
                        </div>
                        <ul class="breadcrumb">
                             <li class="breadcrumb-item"> <a href="#" data-toggle="tooltip"
                             data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home text-white d-inline"></i>
                            <li class="breadcrumb-item">
                                <a class="f-20" href="#">Salas del servicio: {{ $servicio->nombre_servicio }}</a>
                            </li>
                        </ul>
                    </div>
                    @if(isset($pacientes_graves))
                    <div class="col-md-12">
                        <button class="btn btn-danger btn-xs float-right" id="btn_mostrar_pacientes_graves" onclick="mostrar_pacientes_graves()">Ver Pacientes Graves en espera de asignacion ({{ $pacientes_graves->count() }})</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- CIERRE HEADER -->
        <div class="col-md-12">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="text-white f-20 mt-2 mb-2 float-left">Servicio {{ $servicio->nombre_servicio }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="contenedor_salas_hospital">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">{{ $servicio->nombre_servicio }}</h6>
                                            <p>Jefe del Servicio: {{ $servicio->jefe_servicio->nombre }} {{ $servicio->jefe_servicio->apellido_uno }} {{ $servicio->apellido_dos }}</p>
                                            <p>N° de Camas: {{ $servicio->numero_camas }}</p>
                                            <p>N° de Camas Disponibles: {{ $servicio->camas_disponibles }}</p>
                                            <p>N° de Camas Ocupadas: {{ $servicio->camas_ocupadas }}</p>
                                            <p>N° de Salas: {{ $servicio->numero_salas }}</p>
                                        </div>
                                    </div>
                                    <table id="tabla_profesionales_servicios" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <th class="align-center">Médicos</th>
                                        </thead>
                                        <tbody>
                                            @if (count($servicio->profesionales) > 0)
                                                @foreach ($servicio->profesionales as $profesional)
                                                    <tr>
                                                        <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                                    </tr>
                                                @endforeach
                                            @else

                                            @endif
                                        </tbody>
                                    </table>
                                    <table id="tabla_tens_servicios" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <th class="align-center">Tens</th>
                                        </thead>
                                        <tbody>
                                            @if (isset($servicio->tens) && count($servicio->tens) > 0)
                                                @foreach ($servicio->tens as $profesional)
                                                    <tr>
                                                        <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                                    </tr>
                                                @endforeach
                                            @else

                                            @endif
                                        </tbody>
                                    </table>
                                    <table id="tabla_enfermeras_servicios" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <th class="align-center">Enfermeras</th>
                                        </thead>
                                        <tbody>
                                            @if (isset($servicio->tens) && count($servicio->tens) > 0)
                                                @foreach ($servicio->tens as $profesional)
                                                    <tr>
                                                        <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                                    </tr>
                                                @endforeach
                                            @else

                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-9" id="contenedor_salas_servicio">
                                    <div class="row">
                                        @for ($i = 1; $i <= $servicio->numero_salas; $i++)

                                            @php
                                                $id_sala_servicio = $servicio->id.'-'.$i;
                                                // Verificamos si la sala correspondiente ya tiene información en $servicio->salas
                                                $salaInfo = $servicio->salas->where('id_sala_servicio', $id_sala_servicio)->first();

                                            @endphp
                                            <div class="col-md-4" >
                                                <div class="card">
                                                    <div class="card-header d-flex align-items-center justify-content-between bg-info">Sala {{ $i }}</div>
                                                    <div class="card-body {{ $salaInfo && $salaInfo->alerta == 1 ? 'boxEnAlerta white-background' : '' }}">
                                                        @if($salaInfo)
                                                            <p>Cantidad de camas: {{ $salaInfo->cantidad_camas }}</p>
                                                            <div class="camas-container d-flex flex-wrap">
                                                                @for ($j = 1; $j <= $salaInfo->cantidad_camas; $j++)

                                                                    <div class="cama-cubo m-1 ">
                                                                        @foreach ($servicio->pacientes as $p)
                                                                            @if($p->id_cama == $j && $salaInfo->id == $p->id_sala)


                                                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                                                    <img src="{{ asset('images/paciente.png') }}" alt="image" class="image_paciente">
                                                                                    <a href="javascript:void(0)" onclick="abrir_atencion_paciente({{ $p->id_paciente }},{{ $p->id_paciente_triage }})">
                                                                                        <p>{{ $p->nombres }} {{ $p->apellido_uno_paciente }} {{ $p->apellido_dos_paciente }}</p>
                                                                                        <p class="{{ $p->clase_html }} text-center rounded">{{ $p->urgencia }}</p>
                                                                                    </a>
                                                                                 </div>

                                                                                 <div class="d-flex justify-content-between">
                                                                                    <p>{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</p>
                                                                                    <button class="btn btn-outline-danger btn-sm" onclick="sacar_paciente_cama({{ $p->id }})"><i class="fas fa-trash"></i></button>
                                                                                 </div>


                                                                            @if(Auth::user()->id == $p->id_profesional)
                                                                                <p>Paciente Propio</p>
                                                                            @endif

                                                                            @endif
                                                                        @endforeach
                                                                    </div>

                                                                @endfor

                                                                <div class="col-md-12 text-center">
                                                                    <a href="javascript:void(0)" onclick="clave1({{ $salaInfo->id }},'2 - Adulto')"><img src="https://urgencias.med-sdi.cl/images/iconos_urg/em.png" alt="" style="width: 40px;" class="pulsate-fwd"></a>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <p>No hay información disponible para esta sala.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <!--CIERRE: Row Botones -->
</div>

<input type="hidden" name="id_box" id="id_box" value="">
<input type="hidden" name="id_camilla" id="id_camilla" value="">
<input type="hidden" name="id_servicio" id="id_servicio" value="{{ $servicio->id }}">
 @include('app.adm_hospital.modales.asociar_paciente_cama_servicio');
<!--Cierre: Container Completo-->
@endsection



@section('page-script')
<script>
// Objeto para almacenar los IDs de intervalo por cada 'id' de box
var intervalIds = {};
// Objeto para almacenar los IDs de intervalo por cada 'id' de box
var intervalIds = {};
document.addEventListener('DOMContentLoaded', function() {
    // Paso 1: Seleccionar todos los boxes en alerta
    const boxesEnAlerta = document.querySelectorAll('.boxEnAlerta');

    boxesEnAlerta.forEach(box => {
        // Paso 2: Alternar clases en intervalos
        setInterval(() => {
            if (box.classList.contains('red-background')) {
                box.classList.remove('red-background');
                box.classList.add('white-background');
            } else {
                box.classList.remove('white-background');
                box.classList.add('red-background');
            }
        }, 1000); // Cambia 1000 por el intervalo de tiempo deseado en milisegundos

        // Paso 3: Almacenar el ID del intervalo en el objeto
        intervalIds[box.id] = true;

        // Paso 4: Detener el intervalo al hacer clic en el box
        box.addEventListener('click', () => {
            console.log('Deteniendo el cambio de color para el box ' + box.id);
            clearInterval(intervalIds[box.id]);
            delete intervalIds[box.id]; // Eliminar la entrada del objeto
            box.classList.remove('red-background', 'white-background');
        });



    });
});
    function clave1(id, descripcion_box) {
        let url = "{{ route('adm_hospital.clave1') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                id_box: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(data){
                console.log(data);
                let box = data.box;
                let salas_alerta = data.salas_alerta;
                console.log(salas_alerta);
                $('#contenedor_salas_servicio').empty();
                $('#contenedor_salas_servicio').append(data.vista);
                inicializarSalasEnAlerta(); // Llama a la función directamente
                swal({
                    title: "Clave 1",
                    text: data.mensaje+' '+descripcion_box,
                    icon: data.tipo_mensaje,
                    button: "Aceptar",
                })




            },
            error: function(error){
                console.log(error);
            }
        });

    }

    // Contenido de boxesAlerta.js
function inicializarSalasEnAlerta() {
    const boxesEnAlerta = document.querySelectorAll('.boxEnAlerta');

    boxesEnAlerta.forEach(box => {
        const esAlerta = localStorage.getItem(box.id) === 'true';
        intervalIds[box.id] = setInterval(() => {
            if (box.classList.contains('red-background')) {
                box.classList.remove('red-background');
                box.classList.add('white-background');
            } else {
                box.classList.remove('white-background');
                box.classList.add('red-background');
            }
        }, 1000);
    });
}

document.addEventListener('DOMContentLoaded', inicializarSalasEnAlerta);

    function cambiarColor(id, descripcion_box){
        var $cardBody = $('#card-body' + id);
        var alerta = $('#box_alerta'+id).val();
        if($cardBody.hasClass('boxEnAlerta')){
            var es_alerta = true;
        }else{
            var es_alerta = false;
        }

        console.log(es_alerta);

        if(es_alerta){
            // Detener el intervalo
            clearInterval(intervalIds[id]);
            delete intervalIds[id]; // Eliminar la entrada del objeto
            $cardBody.removeClass('red-background white-background').addClass('white-background');
            // Mostrar mensaje indicando que se detuvo el cambio de color
            swal({
                title: "Detenido",
                text: "El cambio automático de color ha sido detenido para el box " + descripcion_box + ".",
                icon: "info",
                button: "Aceptar",
            });
        }else{
        // Verificar si ya hay un intervalo activo para este 'id'
        if (intervalIds[id] ) {
            // Detener el intervalo
            clearInterval(intervalIds[id]);
            delete intervalIds[id]; // Eliminar la entrada del objeto
            $cardBody.removeClass('red-background white-background').addClass('white-background');
            // Mostrar mensaje indicando que se detuvo el cambio de color
            swal({
                title: "Detenido",
                text: "El cambio automático de color ha sido detenido para el box " + descripcion_box + ".",
                icon: "info",
                button: "Aceptar",
            });
        } else {
            // Mostrar un mensaje de emergencia al iniciar
            swal({
                title: "Clave 1",
                text: "Emergencia en el box " + descripcion_box + ". Por favor, atender de inmediato.",
                icon: "warning",
                button: "Aceptar",
            });

            // Iniciar el cambio de color automático
            intervalIds[id] = setInterval(function() {
                    if ($cardBody.hasClass('red-background')) {
                        $cardBody.removeClass('red-background').addClass('white-background');
                    } else {
                        $cardBody.removeClass('white-background').addClass('red-background');
                    }
                }, 1000); // 3000 milisegundos = 3 segundos


        }
        }
    }


    function llamar_paciente(id,numero_box, tipo_box, numero_camillas, camilla){
        $('#id_box').val(id);
        $('#info_box').html('Box N° '+numero_box+' - '+tipo_box);
        $('#llamar_paciente_modal').modal('show');
        $('#id_camilla').val(camilla + 1);


    }

    {{--  function volver_llamar_paciente(id_paciente){
        var id_box = $('#id_box').val();
        var id_camilla = $('#id_camilla').val();
        var data = {
            id_paciente: id_paciente,
            id_box: id_box,
            id_camilla: id_camilla,
            _token: '{{ csrf_token() }}'
        };
        $.ajax({
            type: 'POST',
            url: "{{ route('profesional.llamar_paciente') }}",
            data: data,
            success: function(data){
                console.log(data);
                if(data.mensaje == 'OK'){
                    $('#llamar_paciente_modal').modal('hide');
                    $('#contenedor_boxes').empty();
                    $('#contenedor_boxes').html(data.vista);
                    inicializarBoxesEnAlerta(); // Llama a la función directamente
                    let pacientes = data.pacientes;
                    let pacientes_graves = data.pacientes_graves;
                    if(pacientes_graves.length == 0){
                        $('#btn_mostrar_pacientes_graves').addClass('d-none');
                    }else{
                        $('#btn_mostrar_pacientes_graves').html('Mostrar Pacientes Graves en espera de asignacion ('+pacientes_graves.length+')');
                    }


                    $('#pacientes_triage_urgencia').empty();
                    pacientes.forEach(paciente => {
                        $('#pacientes_triage_urgencia').append(`
                            <div class="mb-3 d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="${paciente.clase_html} text-white">${paciente.codigo}</span>  | ${paciente.nombres} ${paciente.apellido_uno} | <strong> ${paciente.descripcion}</strong>
                                    <p class="text-muted text-white">Fecha ingreso ${paciente.created_at}</p>
                                </div>
                                <button class="btn btn-outline-success btn-sm " onclick="volver_llamar_paciente(${paciente.id_paciente})"><i class="fas fa-phone"></i></button>
                            </div>
                        `);
                    });
                }else{
                    swal({
                        title:'error',
                        text:'se ha producido un error'
                    });
                }

            },
            error: function(html){
                $('#contenedor_boxes').empty();
                $('#contenedor_boxes').html(html);
            }
        });
    }  --}}

    {{--  function sacar_paciente_box(id_paciente,id_box){
        swal({
            title: "¿Estás seguro?",
            text: "¿Deseas sacar al paciente de la cama?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete){
                var data = {
                    id_paciente: id_paciente,
                    id_box: id_box,
                    _token: '{{ csrf_token() }}'
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('enfermeria.sacar_paciente_box') }}",
                    data: data,
                    success: function(data){
                        console.log(data);
                        $('#contenedor_boxes').empty();
                        $('#contenedor_boxes').append(data.vista);
                        inicializarBoxesEnAlerta(); // Llama a la función directamente

                        let pacientes = data.pacientes;
                        let pacientes_graves = data.pacientes_graves;
                        if(pacientes_graves.length > 0){
                            $('#btn_mostrar_pacientes_graves').removeClass('d-none');
                            $('#btn_mostrar_pacientes_graves').html('Mostrar Pacientes Graves en espera de asignacion ('+pacientes_graves.length+')');
                        }else{
                            $('#btn_mostrar_pacientes_graves').addClass('d-none');
                        }
                        $('#pacientes_triage_urgencia').empty();
                        pacientes.forEach(paciente => {
                            $('#pacientes_triage_urgencia').append(`
                                <div class="mb-3 d-flex justify-content-between align-items-start">
                                    <div>
                                        <span class="${paciente.clase_html} text-white">${paciente.codigo}</span>  | ${paciente.nombres} ${paciente.apellido_uno} | <strong> ${paciente.descripcion}</strong>
                                        <p class="text-muted text-white">Fecha ingreso ${paciente.created_at}</p>
                                    </div>
                                    <button class="btn btn-outline-success btn-sm " onclick="volver_llamar_paciente(${paciente.id_paciente})"><i class="fas fa-phone"></i></button>
                                </div>
                            `);
                        });
                    },
                    error: function(data){
                        $('#contenedor_boxes').empty();
                        $('#contenedor_boxes').append(data.responseText);
                    }
                });
            }
        });

    }  --}}

    function abrir_modal_box(){
        $('#modal_box').modal('show');
    }

         function abrir_atencion_paciente(id_paciente, id_paciente_triage = null)
        {
            var url_ = "{{ route('app.enfermeria.atencion') }}";
            cambiar_estado_paciente_triage(id_paciente,id_paciente_triage,url_);
        }

        function cambiar_estado_paciente_triage(id_paciente,id_paciente_triage, url_)
        {
            let url = "{{ route('adm_hospital.cambiar_estado_paciente_triage') }}";
            let id_servicio = $('#id_servicio').val();

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id_servicio: id_servicio,
                    id_paciente_triage: id_paciente_triage,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response){
                    console.log(response);
                    if(response.mensaje == 'OK'){
                        window.location.href = url_ + '?id_paciente='+id_paciente+'&id_servicio='+id_servicio;
                    }
                    else{
                        swal({
                            title: "Error",
                            text: "Ocurrio un error al cambiar el estado del paciente",
                            icon: "error",
                            button: "Aceptar",
                        }).then((value) => {
                            //window.location.reload();

                        })
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        function mostrar_pacientes_graves(){
            // agregar y quitar clase d-none
            $('#pacientes_graves').toggleClass('d-none');
        }

        function asignar_paciente_cama(nombre_servicio, numero_cama, numero_sala){
            // swal({
            //         title: "ASIGNAR",
            //         text: 'EN CONSTRUCCION',
            //         icon: 'info',
            //         button: "Aceptar",
            //     });
            $('#cama_servicio_titulo').html(nombre_servicio);
            $('#cama_servicio_numero').html(numero_cama);
            $('#sala_servicio_numero').html(numero_sala);
            // abrir modal
            $('#llamar_paciente_modal_servicio').modal('show');
        }

        function validar_email_agenda() {
            if ($("#reserva_hora_correo").val().indexOf('@', 0) == -1 || $("#reserva_hora_correo")
                .val().indexOf(
                    '.', 0) == -1) {
                swal({
                    title: "El correo electrónico introducido no es correcto.",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('El correo electrónico introducido no es correcto.');
                $("#guardar_reserva_paciente").prop('disabled', true);
                return false;
            }

            let email = $('#reserva_hora_correo').val();
            let url = "#";

            $.ajax({
                url: url,
                type: "get",
                data: {

                    email: email,

                }

            })
            .done(function(data) {
                if (data == 'fail') {

                    // console.log(data);

                    $('#mensaje_email_reserva').text('el email ya esta en nuestros registros');
                    $('#mensaje_email_reserva').show();
                    $('#reserva_hora_correo').focus();

                    $("#guardar_reserva_paciente").prop('disabled', true);

                } else {
                    $('#mensaje_email_reserva').text('');
                    $('#mensaje_email_reserva').hide();
                    $("#guardar_reserva_paciente").prop('disabled', false);
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

    function validar_campo_telefono()
    {
        var telefono = $('#reserva_hora_telefono_uno').val();
        var email = $('#reserva_hora_correo').val();
        if(email == '')
        {
            // if (telefono != '')
            {
                var re = new RegExp(/^\x2b56[6-9][0-9]{8}$/i);//+56612341234
                if( re.test(telefono) )
                {

                    if (validarEdad($('#reserva_hora_fecha_nac').val())) {
                        console.log("La edad es válida.");
                        $('#btn_reserva_hora_telefono_uno_validar').attr('disabled',false);
                    } else {
                        console.log("La edad no es válida.");
                        $('#btn_reserva_hora_telefono_uno_validar').attr('disabled',true);
                        $("#guardar_reserva_paciente").prop('disabled', true);
                    }

                }
            }
        }
    }

    function validarEdad(fechaNacimiento) {
        // Dividir la fecha de nacimiento en día, mes y año
        var partes = fechaNacimiento.split('/');
        var dia = parseInt(partes[0], 10);
        var mes = parseInt(partes[1], 10) - 1; // Los meses en JavaScript van de 0 a 11
        var anio = parseInt(partes[2], 10);

        // Crear un objeto Date con la fecha de nacimiento
        var fechaNac = new Date(anio, mes, dia);

        // Obtener la fecha actual
        var hoy = new Date();

        // Calcular la diferencia en años
        var edad = hoy.getFullYear() - fechaNac.getFullYear();
        var mes = hoy.getMonth() - fechaNac.getMonth();
        var dia = hoy.getDate() - fechaNac.getDate();

        // Ajustar la edad si el mes o día actual es antes del mes o día de nacimiento
        if (mes < 0 || (mes === 0 && dia < 0)) {
            edad--;
        }

        // Validar si la edad está en el rango de 0 a 120 años
        return edad >= 0 && edad <= 120;
    }

    function sacar_paciente_cama(id){

        swal({
            title: "¿Estás seguro?",
            text: "¿Deseas sacar al paciente de la cama?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete){
                let url = `/AdministradorHospital/Pacientes/Sacar/${id}`;
                console.log(url);
                $.ajax({
                    type:'get',
                    url: url,
                    success: function(resp){
                        console.log(resp);
                        $('#contenedor_salas_servicio').empty();
                        $('#contenedor_salas_servicio').append(resp.v);
                    },
                    error: function(error){
                        console.log(error.responseText);
                    }
                })
            }
        });
    }

</script>
@endsection



