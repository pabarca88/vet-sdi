@component('mail::message')
# Presupuesto de Insumos

Paciente: {{ $ficha->paciente->nombre ?? '' }}
Profesional: {{ $profesional->nombre ?? '' }}

@foreach($insumos as $insumo)
- {{ $insumo['nombre'] }}: {{ $insumo['cantidad'] }} x ${{ $insumo['precio'] }}
@endforeach
