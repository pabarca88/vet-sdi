<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Turnos SDI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            /* height: calc(100vh - 160px); */
            height: calc(89vh - 160px);
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
    <div id="app">
        <pantalla-turnos
        :id-televisor="{{ $televisor->id }}"
        piso="{{ $piso }}"
        logo-insi="{{ $logoInsi }}"
    ></pantalla-turnos>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
