<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card border-success">
            <div class="card-body text-success">
                <h5 class="card-title">Remuneración total</h5>
                <h3 class="card-text">${{ number_format($total_valor, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body text-info">
                <h5 class="card-title">Comisión ({{ isset($porcentaje) ? $porcentaje . '%' : '10%' }})</h5>
                <h3 class="card-text">${{ number_format($total_valor_convenio, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <canvas id="remuneracionTotal"></canvas>
        @if(!empty($nombres_sucursales))
            <div class="row">
                <div class="col-md-12">
                    <strong>Sucursales incluidas:</strong>
                    <ul>
                        @foreach($nombres_sucursales as $nombre)
                            <li>{{ $nombre }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div id="leyendaRemuneracion"></div>
    </div>
</div>
@if(!empty($productos))
<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <div class="card border-success">
            <div class="card-body text-success">
                <h5 class="card-title">Remuneración total</h5>
                <h3 class="card-text">${{ number_format($total_Valor_productos, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-info">
            <div class="card-body text-info">
                <h5 class="card-title">Comisión ({{ isset($porcentaje) ? $porcentaje . '%' : '10%' }})</h5>
                <h3 class="card-text">${{ number_format($total_Valor_productos, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h5>Ventas por producto</h5>
        <canvas id="ventasPorProductoComision"></canvas>
        <div id="leyendaProductoComision"></div>
    </div>
</div>
<script>
(function() {
    let productos = @json($productos);
    let prodLabels = Object.keys(productos);
    let prodData = prodLabels.map(n => productos[n].total);
    let prodColors = ["#36A2EB", "#FF6384", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
    let ctxProd = document.getElementById('ventasPorProductoComision')?.getContext('2d');
    if(ctxProd) {
        new Chart(ctxProd, {
            type: 'bar',
            data: {
                labels: prodLabels,
                datasets: [{
                    label: 'Total vendido',
                    data: prodData,
                    backgroundColor: prodColors
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                responsive: true
            }
        });
    }
    // Leyenda productos
    let leyendaHtml = '<strong>Leyenda:</strong><ul>';
    prodLabels.forEach((nombre, i) => {
        leyendaHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${prodColors[i % prodColors.length]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaHtml += '</ul>';
    let leyendaDiv = document.getElementById('leyendaProductoComision');
    if(leyendaDiv) leyendaDiv.innerHTML = leyendaHtml;
})();
</script>
@endif
<script>
(function() {
    let horas_medicas = @json($horas_medicas);

    // Agrupa por tipo de examen/procedimiento
    let examenes = {};
    let colores = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
    let colorIndex = 0;
    horas_medicas.forEach(hm => {
        let nombre = hm.procedimientos_centro ? hm.procedimientos_centro.nombre : (hm.nombre || 'Sin nombre');
        if (!examenes[nombre]) {
            examenes[nombre] = { total: 0, cantidad: 0, color: colores[colorIndex % colores.length] };
            colorIndex++;
        }
        examenes[nombre].total += hm.valor ? parseInt(hm.valor) : 0;
        examenes[nombre].cantidad += 1;
    });

    let examLabels = Object.keys(examenes);
    let examData = examLabels.map(n => examenes[n].total);
    let examCantidad = examLabels.map(n => examenes[n].cantidad);
    let examColors = examLabels.map(n => examenes[n].color);

    let ctxExam = document.getElementById('remuneracionTotal').getContext('2d');
    new Chart(ctxExam, {
        type: 'bar',
        data: {
            labels: examLabels,
            datasets: [
                {
                    label: 'Remuneración por examen',
                    data: examData,
                    backgroundColor: examColors
                },
                {
                    label: 'Cantidad de exámenes',
                    data: examCantidad,
                    backgroundColor: examColors.map(c => c + '80'), // color más suave
                    type: 'line', // opcional: para mostrar la cantidad como línea
                    yAxisID: 'y-cantidad'
                }
            ]
        },
        options: {
            plugins: { legend: { display: true } },
            responsive: true,
            scales: {
                y: { beginAtZero: true, title: { display: true, text: 'Remuneración ($)' } },
                'y-cantidad': {
                    beginAtZero: true,
                    position: 'right',
                    title: { display: true, text: 'Cantidad' },
                    grid: { drawOnChartArea: false }
                }
            }
        }
    });

    // Leyenda
    let leyendaHtml = '<strong>Leyenda:</strong><ul>';
    examLabels.forEach((nombre, i) => {
        leyendaHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${examColors[i]};margin-right:5px;"></span>${nombre} - ${examenes[nombre].cantidad} exámenes</li>`;
    });
    leyendaHtml += '</ul>';
    document.getElementById('leyendaRemuneracion').innerHTML = leyendaHtml;
})();
</script>
