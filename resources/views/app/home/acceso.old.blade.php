<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        @if (Auth::user()->hasRole('Profesional') || Auth::user()->hasRole('Admin'))
            <li><a href="{{ ROUTE('profesional.home') }}">Profesional</a></li>
        @endif
        @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Admin'))
            <li><a href="{{ ROUTE('administrador.home') }}">Administrador</a></li>
        @endif
        @if (Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('Admin'))
            <li><a href="{{ ROUTE('asistente.home') }}">Asistente</a></li>
        @endif
        @if (Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('Admin'))
            <li><a href="{{ ROUTE('asistentecm.home') }}">Asistente Centro Medico</a></li>
        @endif
        @if (Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('Admin'))
            <li><a href="{{ ROUTE('asistenteon.home') }}">Asistente Online</a></li>
        @endif
        @if (Auth::user()->hasRole('Paciente') || Auth::user()->hasRole('Admin'))
            <li><a href="{{ ROUTE('paciente.home') }}">Paciente</a></li>
        @endif
    </ul>
</body>

</html>
