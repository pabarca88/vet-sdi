<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PLANTILLA PDF</title>
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        p,
        td,
        th {
            font-family: arial;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        img {
            align-items: center;
            width: 18%;
        }

        table,
        th,
        td {
            border: 0px solid black;
            text-align: left;
            margin-right: 10px;
            margin-left: 10px;
        }

        table {
            width: 80%;
        }

        hr {
            border: 1px solid #3366CC;
        }

        #titulo-azul {
            color: #3366CC;
            text-align: center;
        }

        .contenido {
            font-size: 15px;
            color: #3F3E3E;
        }

        #centro {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="contenido">
        <img class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}">
        <hr>
        <table>
            <tr>
                <td><strong>Paciente:</strong></td>
                <td>ALAN ALEJANDRO RAMIREZ QUIROZ</td>
                <td><strong>Fecha:</strong></td>
                <td>12/05/2022</td>
            </tr>
            <tr>
                <td><strong>Rut:</strong></td>
                <td>13.233.544.0</td>
            </tr>
            <tr>
                <td><strong>Edad:</strong></td>
                <td>32</td>
            </tr>
        </table>
        <hr>
        <!--Inicio de información-->
        <p>
        <h2 id="titulo-azul">Receta Médica</h2>
        <h4>Rp:</h4>
        <table>
            <tr>
                <td><strong>Kitadol 500mg</strong> (Paracetamol)</td>
            </tr>
            <tr>
                <td>1 Comprimido</td>
            </tr>
            <tr>
                <td>Cada 8 horas</td>
            </tr>
            <tr>
                <td>Por 7 días</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><strong>Nefersil 125mg</strong> (Clonixinato de Lisina)</td>
            </tr>
            <tr>
                <td>1 Comprimido</td>
            </tr>
            <tr>
                <td>Cada 12 horas</td>
            </tr>
            <tr>
                <td>Por 5 días</td>
            </tr>
        </table>
        </p>
        <!--Cierre: Inicio de información-->
        <hr>
        <p>
        <table>
            <tr>
                <td><strong>Dr. Jaime Kriman Astorga</strong></td>
            </tr>
            <tr>
                <td><strong>Rut:</strong> 10.233.444-3</td>
            </tr>
            <tr>
                <td>OTORRINOLARINGOLOGO</td>
            </tr>
        </table>
        </p>
        <hr>
    </div>
</body>

</html>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PLANTILLA PDF</title>
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        p,
        td,
        th {
            font-family: arial;
        }

        h1 {
            text-align: center;
            text-transform: uppercase;
        }

        img {
            align-items: center;
            width: 18%;
        }

        table,
        th,
        td {
            border: 0px solid black;
            text-align: left;
            margin-right: 10px;
            margin-left: 10px;
        }

        table {
            width: 80%;
        }

        hr {
            border: 1px solid #3366CC;
        }

        #titulo-azul {
            color: #3366CC;
            text-align: center;
        }

        .contenido {
            font-size: 15px;
            color: #3F3E3E;
        }

        #centro {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="contenido">
        <img class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}">
        <hr>
        <table>
            <tr>
                <td><strong>Paciente:</strong></td>
                <td>ALAN ALEJANDRO RAMIREZ QUIROZ</td>
                <td><strong>Fecha:</strong></td>
                <td>12/05/2022</td>
            </tr>
            <tr>
                <td><strong>Rut:</strong></td>
                <td>13.233.544.0</td>
            </tr>
            <tr>
                <td><strong>Edad:</strong></td>
                <td>32</td>
            </tr>
        </table>
        <hr>
        <!--Inicio de información-->
        <p>
        <h2 id="titulo-azul">Receta Médica</h2>
        <h4>Rp:</h4>
        <table>
            <tr>
                <td><strong>Kitadol 500mg</strong> (Paracetamol)</td>
            </tr>
            <tr>
                <td>1 Comprimido</td>
            </tr>
            <tr>
                <td>Cada 8 horas</td>
            </tr>
            <tr>
                <td>Por 7 días</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><strong>Nefersil 125mg</strong> (Clonixinato de Lisina)</td>
            </tr>
            <tr>
                <td>1 Comprimido</td>
            </tr>
            <tr>
                <td>Cada 12 horas</td>
            </tr>
            <tr>
                <td>Por 5 días</td>
            </tr>
        </table>
        </p>
        <!--Cierre: Inicio de información-->
        <hr>
        <p>
        <table>
            <tr>
                <td><strong>Dr. Jaime Kriman Astorga</strong></td>
            </tr>
            <tr>
                <td><strong>Rut:</strong> 10.233.444-3</td>
            </tr>
            <tr>
                <td>OTORRINOLARINGOLOGO</td>
            </tr>
        </table>
        </p>
        <hr>
    </div>
</body>

</html>
