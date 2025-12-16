<div id="contenedor_evolucion_{{ $idCounter }}">
    <div class="form-row">
        <div class="form-group col-md-2">
            @php
            //imprimir la fecha y la hora actual
            $fecha = \Carbon\Carbon::parse(now());
            $fecha = $fecha->format('d-m-Y H:i');
            echo $fecha.' '.\Auth::user()->name;
            @endphp
        </div>
        <div class="form-group col-md-10">
            <label class="floating-label-active">Evolución</label>
            <textarea class="form-control form-control-sm" name="evolucion{{ $idCounter }}" id="evolucion{{ $idCounter }}" rows="2" onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
        </div>
        <hr>

    </div>
    {{-- <div class="form-row">
        <div class="form-group col-md-12">
            <h6 class="text-c-blue">
                Resumen de
                evoluciones e
                interconsultas</h6>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <textarea class="form-control form-control-sm" name="resumen_evolucion{{ $idCounter }}" id="resumen_evolucion{{ $idCounter }}" rows="3" onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
        </div>
    </div> --}}
    <div class="form-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
            <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucionPacienteHospital({{ $idCounter }})"><i class="feather icon-x"></i> </button>
            <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPacienteHospital({{ $idCounter }})"><i class="feather icon-save"></i> </button>
        </div>
    </div>
</div>

<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="evolucion{{ $idCounter }}" id="evolucion{{ $idCounter }}" value="">
