<div class="form-row" id="resumen_costos_lab">
    <div class="col-12">
        <h6 class="sub-aten">Resumen de costos</h6>
    </div>

    @php $suma = 0; @endphp
    @foreach ($ordenes_trabajo_menor as $o)
        @if($o->presupuesto == 1)
            @php $suma += $o->valor_prestacion; @endphp
        @endif
    @endforeach

    <div class="col-md-6 offset-md-3">
        <div class="card border-success shadow-sm">
            <div class="card-body text-center">
                <h5 class="card-title mb-1">Total Prestaciones en Presupuesto</h5>
                <h4 class="text-success font-weight-bold">{{ number_format($suma, 0, ',', '.') }} CLP</h4>
            </div>
        </div>
    </div>
</div>
