<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Turnos SDI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Roboto+Condensed:wght@700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --verde-claro: #05CEA7;
            --verde-medio: #00A99D;
            --verde-oscuro: #037F70;
            --azul-claro: #0071BC;
            --azul-medio: #003891;
            --azul-oscuro: #012A5B;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            height: 100vh;
            overflow: hidden;
        }

        .header {
            background: #fff;
            color: var(--azul-medio);
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hora-header {
            color: var(--azul-medio);
            font-size: 7rem;
            font-weight: 800;
        }

        .piso-header {
            background: transparent !important;
            color: var(--azul-medio) !important;
            font-size: 7rem !important;
            font-weight: 900 !important;
            height: 100%;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-container {
            height: calc(100vh - 120px);
        }

        .turnos-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .current-turn {
            background-color: var(--verde-medio);
            color: #FFF;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: var(--azul-oscuro);
        }

        .table-header {
            color: white;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            border-radius: 10px 10px 0 0;
        }

        .th-col-uno {
            background-color: var(--verde-claro);
            padding: 1rem;
            text-align: center;
        }

        .th-col-dos {
            background-color: var(--verde-medio);
            padding: 1rem;
            text-align: center;
        }

        .th-col-tres {
            background-color: var(--verde-oscuro);
            padding: 1rem;
            text-align: center;
        }

        .tr-col-uno {
            background-color: var(--azul-claro);
            padding: 0.5rem;
            text-align: center;
        }

        .tr-col-dos {
            background-color: var(--azul-medio);
            padding: 0.5rem;
            text-align: left;
            padding-left: 1rem
        }

        .tr-col-tres {
            background-color: var(--azul-oscuro);
            padding: 0.5rem;
            text-align: center;
        }

        .table-row {
            padding: 1rem 0;
            color: #FFF;
        }

        /* .table-row:nth-child(even) {
            background-color: #f9f9f9;
        } */

        .turn-title {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: #FFF;
            background-color: var(--azul-medio);
            padding: 12px;
            width: 60%;
            margin: 0 auto;
            border-radius: 35px;
        }

        .patient-name {
            font-family: 'Roboto Condensed', sans-serif;
            font-weight: bold;
            color: #FFF;
            line-height: 1.2;
            font-size: 7rem;
        }

        .box-info {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: #FFF;
            background-color: var(--azul-medio);
            padding: 12px;
            width: 60%;
            margin: 0 auto;
            border-radius: 35px;
        }

        .box-info2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: #FFF;
            font-size: 10rem;
        }

        .time-floor {
            color: var(--azul-medio);
        }

        .footer {
            color: var(--azul-claro);
            font-size: 5rem;
            background-color: #FFF;
        }

        .footer-right {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-style: italic;
        }

        /* Tamaños de fuente responsivos */
        .fs-7 {
            font-size: 1.8rem;
        }

        .fs-8 {
            font-size: 2.5rem;
        }

        .fs-9 {
            font-size: 3rem;
        }

        .fs-10 {
            font-size: 3.5rem;
        }

        .fs-11 {
            font-size: 4rem;
        }

        .fs-12 {
            font-size: 4.5rem;
        }

        @keyframes flash {

            0%,
            100% {
                background-color: var(--verde-medio);
            }

            25%,
            75% {
                background-color: #fff200;
            }

            /* Amarillo para parpadeo */
        }

        .flash-turn {
            animation: flash 0.8s 2;
        }
    </style>
</head>

<body class="d-flex flex-column">
    <!-- Header -->
    <header class="header bg-white py-3">
        <div class="row  g-0 align-items-center">
            <div class="col-lg-8 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center" style="height: 80px;">
                    <img src="{{ asset('images/logo_instituciones/logo_insi.jpg') }}" alt="Logo" class="img-fluid"
                        style="max-height: 80px;" id="logo-header">
                </div>
                <div class="hora-header text-end" id="hora-header">
                    {{-- 13:50 --}}
                </div>
            </div>
            <div class="col-lg-4 piso-header" id="piso-header">
                {{-- PISO 1 --}}
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-container container-fluid py-3">
        <div class="row  g-3">
            <!-- Tabla de turnos (div-based) -->
            <div class="col-lg-8 ">
                <div class="turnos-container  d-flex flex-column p-4">
                    <!-- Encabezado de la tabla -->
                    <div class="table-header row g-0 text-white p-3 fs-8 rounded">
                        <div class="col-3 th-col-uno">LLAMADO</div>
                        <div class="col-7 th-col-dos">TURNO</div>
                        <div class="col-2 th-col-tres">BOX</div>
                    </div>

                    <!-- Filas de la tabla -->
                    <div class="table-body flex-grow-1" id="turnos-container">
                        {{--  --}}
                    </div>
                </div>
            </div>

            <!-- Turno actual -->
            <div class="col-lg-4 ">
                <div class="current-turn p-5">
                    <div class="turn-title text-center mb-5 fs-10">SU TURNO</div>
                    <div class="patient-name text-center mb-5 " id="nombre_paciente">-</div>
                    <div class="box-info text-center fs-11">BOX</div>
                    <div class="box-info2 text-center" id="nombre_box">0</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer py-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 text-start fs-8">
                    SE PARTE DE SDI, REGÍSTRATE EN WWW.MED-SDI.CL
                </div>
                <div class="col-md-2 text-end footer-right fs-7">
                    <img src="{{ asset('images/logo_pais_horizontal.svg') }}" alt="" style="height: 120px;">
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="modal_mnsaje_inicio" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_mnsaje_inicio" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_mnsaje_inicioLabel">Mensaje de Inicial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_mnsaje_inicio').modal('hide');"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bienvenido a la pantalla de turnos del sistema SDI. Aquí podrás ver los turnos actuales y el turno que te corresponde.</p>
                    <p>Para más información, visita nuestro sitio web o contacta con el soporte técnico.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#modal_mnsaje_inicio').modal('hide');">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


        <audio id="ding-sound" src="{{ asset('sounds/new-notification-022-370046.mp3') }}"></audio>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let ultimoPaciente = '';

    $(document).ready(function () {
        $('#modal_mnsaje_inicio').modal('show');
    });
    $(document).one('click', function() {
        document.getElementById('ding-sound').play().catch(() => {});
    });

    function actualizarPantalla() {
        $.get('{{ route('api.pantalla.token', ['token' => $televisor->token]) }}', function(data) {
            // Actualiza hora
            $('#hora-header').text(data.hora);
            // Actualiza piso
            $('#piso-header').text('PISO ' + data.piso);
            // Actualiza turnos
            let html = '';
            data.llamados.forEach(function(item) {
                html += `
                    <div class="table-row row g-0 align-items-center fs-8 px-3">
                        <div class="col-3 tr-col-uno">${item.minutos} MIN.</div>
                        <div class="col-7 tr-col-dos">${item.paciente}</div>
                        <div class="col-2 tr-col-tres">${item.box}</div>
                    </div>
                `;
            });
            $('#turnos-container').html(html);

            // Mostrar el último llamado en la sección derecha
            if (data.llamados.length > 0) {
                let ultimo = data.llamados[0];
                $('#nombre_paciente').html(ultimo.paciente.replace(' ', '<br>'));
                $('#nombre_box').text(ultimo.box);

                // Detecta si hay un nuevo paciente o un nuevo llamado (cantidad_llamados)
                if (ultimoPaciente !== ultimo.paciente || ultimoCantidadLlamados !== ultimo.cantidad_llamados) {
                    ultimoPaciente = ultimo.paciente;
                    ultimoCantidadLlamados = ultimo.cantidad_llamados;

                    // Parpadeo
                    $('.current-turn').addClass('flash-turn');
                    setTimeout(() => {
                        $('.current-turn').removeClass('flash-turn');
                    }, 1600);

                    // Sonido
                    document.getElementById('ding-sound').play();

                    // console.log('Nuevo llamado:', ultimo.paciente, 'Box:', ultimo.box);

                    // Lectura del nombre y box (con número en texto)
                    if ('speechSynthesis' in window) {
                        let textoBox = ultimo.box ? `Box ${ultimo.box}` : '';
                        let textoLectura = `${ultimo.paciente} ${textoBox}`;
                        let utter = new SpeechSynthesisUtterance(textoLectura);
                        utter.lang = 'es-ES';
                        utter.rate = 0.6;
                        window.speechSynthesis.speak(utter);
                    }
                }
            } else {
                $('#nombre_paciente').html('');
                $('#nombre_box').text('');
                ultimoPaciente = '';
                ultimoCantidadLlamados = '';
            }

        });
    }

    // Actualiza cada 5 segundos
    setInterval(actualizarPantalla, 5000);
    // Primera carga
    actualizarPantalla();

    // Actualiza la hora en tiempo real (opcional, si quieres que avance cada segundo)
    setInterval(function() {
        let now = new Date();
        let h = now.getHours().toString().padStart(2, '0');
        let m = now.getMinutes().toString().padStart(2, '0');
        $('#hora-header').text(h + ':' + m);
    }, 1000);
</script>

</html>
