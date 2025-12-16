
    <div class="card-body">
        <h4 class="card-title font-weight-bold">Comparativo (Ingresos vs Gastos)</h4>

        <p class="card-text">Aqui puedes ver las estadísticas comparativas entre ingresos y gastos del inventario.</p>
      <!-- Formulario de filtros generales -->
        <form method="GET" action="" class="mb-4">
            <div class="form-row align-items-end">
                <div class="form-group col-md-4">
                    <label for="fecha_inicio_comparativo">Fecha inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio_comparativo" name="fecha_inicio_gastos" value="{{ request('fecha_inicio_gastos') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="fecha_final_comparativo">Fecha final</label>
                    <input type="date" class="form-control" id="fecha_final_comparativo" name="fecha_final_gastos"  value="{{ request('fecha_final_gastos') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="institucion_comparativo">Institución</label>
                    <select class="form-control" id="institucion_comparativo" name="institucion_comparativo" onchange="cargarComparativo()">
                        <option value="">Todas</option>
                        @foreach($sucursales ?? [] as $inst)
                            <option value="{{ $inst->id }}" {{ request('institucion_comparativo') == $inst->id ? 'selected' : '' }}>{{ $inst->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <div id="grafico_comparativo_ingresos_gastos"></div>
    </div>
