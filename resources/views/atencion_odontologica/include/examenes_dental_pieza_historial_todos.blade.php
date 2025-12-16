@php $counter = 1; @endphp
@foreach ($examenes as $examen )
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm" name="historia_pza{{ $counter }}" id="historia_pza{{ $counter }}" value="{{ $examen->numero_pieza }}">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Pérdida de la pieza</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $examen->perdida }}">
                        </div>
                        <div class="form-group" id="div_perdida{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Otro motivo</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_perdida{{ $counter }}" id="obs_perdida{{ $counter }}"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Años</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $examen->tiempo }}">
                        </div>
                        <div class="form-group" id="div_anos_perd{{ $counter }}" style="display:none;">
                            <label class="floating-label-activo-sm">Años</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_anos_perd{{ $counter }}" id="obs_anos_perd{{ $counter }}"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Observaciones Pérdida</label>
                    <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Oral" data-seccion="Examen Oral" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_ex_oral{{ $counter }}" id="obs_ex_oral{{ $counter }}">{{ $examen->observaciones }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_hist({{ $examen->id }})">X</button>
        </div>
    </div>
</div>

@php $counter++; @endphp
@endforeach



