@component('mail::message')
# Presupuesto veterinario

Paciente: {{ $paciente->nombres ?? '' }} {{ $paciente->apellido_uno ?? '' }} {{ $paciente->apellido_dos ?? '' }}
Profesional: {{ $profesional->nombre ?? '' }} {{ $profesional->apellido_uno ?? '' }} {{ $profesional->apellido_dos ?? '' }}

Se adjunta el presupuesto veterinario en PDF.
@endcomponent
