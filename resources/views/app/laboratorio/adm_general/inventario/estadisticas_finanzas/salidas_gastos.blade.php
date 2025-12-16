
    <div class="card-body">
        <h4 class="card-title font-weight-bold">Salidas y Gastos</h4>

        <p class="card-text">Aqui puedes ver las estadísticas relacionadas con las salidas y gastos del inventario.</p>
          <!-- Formulario de filtros generales -->
        <form method="GET" action="" class="mb-4">
            <div class="form-row align-items-end">
                <div class="form-group col-md-4">
                    <label for="fecha_inicio">Fecha inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio_gastos" name="fecha_inicio_gastos" value="{{ request('fecha_inicio_gastos') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="fecha_final">Fecha final</label>
                    <input type="date" class="form-control" id="fecha_final_gastos" name="fecha_final_gastos"  value="{{ request('fecha_final_gastos') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="institucion">Institución</label>
                    <select class="form-control" id="institucion_gastos" name="institucion_gastos" onchange="cargarGastos()">
                        <option value="">Todas</option>
                        @foreach($sucursales ?? [] as $inst)
                            <option value="{{ $inst->id }}" {{ request('institucion_gastos') == $inst->id ? 'selected' : '' }}>{{ $inst->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="form-group col-md-3">
                    <label for="profesional">Profesional</label>
                    <select class="form-control" id="profesional_gastos" name="profesional_gastos">
                        <option value="">Todos</option>
                        @foreach($profesionales ?? [] as $prof)
                            <option value="{{ $prof->id }}" {{ request('profesional_gastos') == $prof->id ? 'selected' : '' }}>{{ $prof->nombre }} {{ $prof->apellido_uno }}</option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
        </form>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5>Totales</h5>
                <p>Resumen general de ingresos, egresos y balance.</p>
            </div>
            <button class="btn btn-success btn-sm" id="excel_totales"><i class="feather icon-download"></i> Exportar Excel</button>
        </div>
        <ul>
            <li>Ingresos totales: <strong>$0</strong></li>
            <li>Egresos totales: <strong>$0</strong></li>
            <li>Balance: <strong>$0</strong></li>
        </ul>
        <div id="grafico_salidas_gastos"></div>
    </div>
