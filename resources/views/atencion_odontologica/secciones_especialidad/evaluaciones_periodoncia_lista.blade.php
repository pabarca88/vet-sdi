@if($evaluaciones && $evaluaciones->count() > 0)
    @foreach($evaluaciones as $evaluacion)
    <div class="card-informacion">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group mb-3">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Pieza N°</label>
                        <div class="border rounded p-2 bg-white shadow-sm">
                            <strong class="text-primary h5 mb-0">{{ $evaluacion->pieza }}</strong>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="form-group mb-3">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Antec. molestias</label>
                        <div class="border rounded p-2 bg-white shadow-sm" style="min-height: 38px;">
                            <span class="text-dark">{{ $evaluacion->antecedentes_molestias }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group mb-3">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Eval-clínica (pus)</label>
                        <div class="border rounded p-2 bg-white shadow-sm" style="min-height: 38px;">
                            <span class="text-dark">{{ $evaluacion->evaluacion_clinica }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="form-group mb-3">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Estudio-rx.</label>
                        <div class="border rounded p-2 bg-white shadow-sm" style="min-height: 38px;">
                            <span class="text-dark">{{ $evaluacion->estudio_rx }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group mb-3">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Diagnóstico periodontal local</label>
                        <div class="border rounded p-2 bg-white shadow-sm" style="min-height: 38px;">
                            <span class="text-dark">{{ $evaluacion->diagnostico }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group mb-3">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Lesión por Enfermedad sistémica</label>
                        <div class="border rounded p-2 bg-white shadow-sm" style="min-height: 38px;">
                            <span class="text-dark">{{ $evaluacion->lesion_sistemica }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group mb-3">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Diagnóstico Periodontal</label>
                        <div class="border rounded p-2 bg-white shadow-sm" style="min-height: 38px;">
                            <span class="text-dark">{{ $evaluacion->dg_period ?: 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group mb-0">
                        <label class="floating-label-activo-sm text-muted small font-weight-bold">Observaciones</label>
                        <div class="border rounded p-3 bg-white shadow-sm" style="min-height: 60px;">
                            <span class="text-dark">{{ $evaluacion->observaciones ?: 'Sin observaciones' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <h6 class="mb-0 font-weight-bold">
                <i class="fas fa-tooth mr-2"></i> Evaluación Pieza {{ $evaluacion->pieza }}
            </h6>
            <div class="d-flex justify-content-between align-items-start">
                <small class="mr-3 opacity-75">
                    <i class="far fa-calendar-alt mr-1"></i>{{ $evaluacion->created_at->format('d/m/Y H:i') }}
                </small>
                <div class="btn-group" role="group">

                    <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_evaluacion_periodonto({{ $evaluacion->id }})" title="Eliminar evaluación">
                        X
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="alert alert-info text-center shadow-sm border-0">
        <div class="d-flex align-items-center justify-content-center">
            <i class="fas fa-info-circle fa-2x mr-3 text-info"></i>
            <div>
                <h6 class="alert-heading mb-1">Sin evaluaciones registradas</h6>
                <small class="mb-0">No hay evaluaciones de periodoncia registradas para esta ficha de atención.</small>
            </div>
        </div>
    </div>
@endif
