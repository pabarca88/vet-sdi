<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajo Menor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .contenedor {
            width: 100%;
            border-collapse: collapse;
        }
        .contenedor td, .contenedor th {
            border: 1px solid black;
            padding: 8px;
        }
        .contenedor th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="titulo">Orden de Trabajo Menor - Área Dental</div>

    <table class="contenedor">
        <tr>
            <th>Doctor</th>
            <td>{{ $datos->clinica_doctor }}</td>
        </tr>
        <tr>
            <th>Paciente</th>
            <td>{{ $datos->paciente_trabajo_menor }}</td>
        </tr>
        <tr>
            <th>RUT Profesional</th>
            <td>{{ $datos->rut_profesional }}</td>
        </tr>
        <tr>
            <th>N° Orden Trabajo</th>
            <td>{{ $datos->nro_orden_trabajo_menor }}</td>
        </tr>
        <tr>
            <th>Trabajo a Realizar</th>
            <td>{{ $datos->trabajo_realizar }}</td>
        </tr>
        <tr>
            <th>Material</th>
            <td>{{ $datos->material }}</td>
        </tr>
        <tr>
            <th>Color</th>
            <td>{{ $datos->color }}</td>
        </tr>
        <tr>
            <th>Guía</th>
            <td>{{ $datos->guia }}</td>
        </tr>
        <tr>
            <th>Urgencia</th>
            <td>{{ $datos->urgencia }}</td>
        </tr>
        <tr>
            <th>Comentarios</th>
            <td>{{ $datos->comentarios_trabajo_menor }}</td>
        </tr>
    </table>
</body>
</html>
