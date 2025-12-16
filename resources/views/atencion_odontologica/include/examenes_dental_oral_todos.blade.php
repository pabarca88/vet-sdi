@php $count = 0; @endphp
@foreach ($imagenes as $imagen)
<div class="card">
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="col-sm-4 mt-2">
                        <div class="card">
                            <div class="card text-center" id="img">
                                <H6>Imagenes Pre</H6>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4 mt-2">
                        <div class="card">
                            <div class="card text-center" id="img">
                                <H6>Imagenes Post</H6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-2">
                        <div class="form-group fill">
                            <input type="hidden" name="biopsia_odont{{ $count }}" id="biopsia_odont{{ $count }}" value="">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" onchange="biopsia('odont',{{ $count }});" id="biopsia_check_odont{{ $count }}" name="biopsia_check_odont{{ $count }}" value="" disabled>
                                <label for="biopsia_check_odont{{ $count }}" class="cr"></label>
                            </div>
                            <label>biopsia</label>
                            <hr>
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Zona y Motivo</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="od_biop_zona{{ $count }}" id="od_biop_zona{{ $count }}" disabled>{{ $imagen->zona_y_motivo }}</textarea>
                            </div>
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones y Resultado</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_result_biopsia{{ $count }}" id="obs_result_biopsia{{ $count }}" disabled>{{ $imagen->observaciones }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">

        <div class="form-row">
            <div class="col-sm-12 mt-2">

                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_imagenes({{ $imagen->id }})">X</button>
            </div>
        </div>
    </div>
</div>

@php $count++; @endphp
@endforeach
