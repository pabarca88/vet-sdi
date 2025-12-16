@if($evaluaciones && $evaluaciones->count() > 0)
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">Pieza</th>
                <th class="text-center">Antecedentes/Molestias</th>
                <th class="text-center">Evaluación Clínica</th>
                <th class="text-center">Estudio RX</th>
                <th class="text-center">Diagnóstico</th>
                <th class="text-center">Lesión Sistémica</th>
                <th class="text-center">Diagnóstico Periodontal</th>
                <th class="text-center">Observaciones</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluaciones as $evaluacion)
            <tr>
                <td class="text-center font-weight-bold">{{ $evaluacion->pieza }}</td>
                <td class="text-center">{{ $evaluacion->antecedentes_molestias }}</td>
                <td class="text-center">{{ $evaluacion->evaluacion_clinica }}</td>
                <td class="text-center">{{ $evaluacion->estudio_rx }}</td>
                <td class="text-center">{{ $evaluacion->diagnostico }}</td>
                <td class="text-center">{{ $evaluacion->lesion_sistemica }}</td>
                <td class="text-center">{{ $evaluacion->dg_period ?: 'N/A' }}</td>
                <td class="text-center">{{ $evaluacion->observaciones ?: 'N/A' }}</td>
                <td class="text-center">{{ $evaluacion->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-center">
                    <button class="btn btn-sm btn-warning" onclick="editar_evaluacion_periodonto({{ $evaluacion->id }})" title="Editar">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger ml-1" onclick="eliminar_evaluacion_periodonto({{ $evaluacion->id }})" title="Eliminar">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="alert alert-info text-center">
    <i class="fas fa-info-circle"></i> No hay evaluaciones de periodoncia registradas para esta ficha.
</div>
@endif
