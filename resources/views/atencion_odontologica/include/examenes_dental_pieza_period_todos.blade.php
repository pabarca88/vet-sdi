@foreach ($examenes as $e)
<div class="card-informacion">
    <div class="card-header">
        <h6 class="mb-0">
            <span class="badge badge-primary">Pieza {{ $e->numero_pieza }}</span>
            <div class="float-right">
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_examen_period({{ $e->id }})">
                    <i class="feather icon-trash-2"></i> Eliminar
                </button>
                <button type="button" class="btn btn-outline-warning btn-sm" onclick="editar_examen_period({{ $e->id }})">
                    <i class="feather icon-edit"></i> Editar
                </button>
            </div>
        </h6>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 mt-3">
                <div class="card-informacion">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->numero_pieza }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Sangrado</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->sangrado }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Supuración</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->supuracion }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Higiene</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->higiene }}" readonly>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Alt MG</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->alt_mg }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">P-Sondaje</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->p_sondaje }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Movilidad-pieza</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->mov_dent }}" readonly>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Furcas</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->furca }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo sonda</label>
                                    <input type="text" class="form-control form-control-sm" value="{{ $e->tipo_sonda }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea class="form-control form-control-sm" rows="2" readonly>{{ $e->obs_perio_pza }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card-informacion">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="biopsia_check_period_view{{ $e->id }}" name="biopsia_check_period_view{{ $e->id }}" 
                                       @if($e->biopsia == 'Sí' || $e->biopsia == '1') checked @endif disabled>
                                <label for="biopsia_check_period_view{{ $e->id }}" class="cr"></label>
                            </div>
                            <label>Biopsia</label>
                            
                            @if($e->biopsia == 'Sí' || $e->biopsia == '1')
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Zona y Motivo</label>
                                <textarea class="form-control form-control-sm" rows="2" readonly>{{ $e->zona_motivo }}</textarea>
                            </div>
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones y Resultado</label>
                                <textarea class="form-control form-control-sm" rows="3" readonly>{{ $e->observaciones_biopsia }}</textarea>
                            </div>
                            @endif
                            
                            <hr>
                            <h6 style="color: #666;">Estado general del periodonto</h6>
                            <hr>
                            <div class="form-group text-center">
                                <small class="text-muted">
                                    <i class="feather icon-calendar"></i> 
                                    Registrado: {{ $e->created_at ? $e->created_at->format('d/m/Y H:i') : 'Sin fecha' }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@if(count($examenes) == 0)
<div class="card-informacion">
    <div class="card-body text-center">
        <div class="empty-state">
            <i class="feather icon-search" style="font-size: 48px; color: #ccc;"></i>
            <h5 class="mt-3">No hay exámenes de periodoncia registrados</h5>
            <p class="text-muted">Los exámenes que registres aparecerán aquí con el mismo formato del formulario.</p>
        </div>
    </div>
</div>
@endif
