<p>Estimado/a {{ $paciente->nombres }} {{ $paciente->apellido_uno }},</p>
<p>Debe realizarse los siguientes exámenes:</p>
<ul>
@foreach($examenes as $examen)
    <li>{{ $examen }}</li>
@endforeach
</ul>
<p>Saludos.</p>
