
<div class="row">
    <div class="col-md-7">
        <h5>Gastos por concepto</h5>
        <canvas id="graficoGastos"></canvas>
        <div id="leyendaGastos"></div>
    </div>
    <div class="col-md-5">
        <h6>Detalle de gastos</h6>
        <table class="table table-sm table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Emisor</th>
                    <th>Folio</th>
                    <th>Monto</th>
                    <th>Vencimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gastos as $gasto)
                <tr>
                    <td>{{ $gasto['nombre'] }}</td>
                    <td>{{ $gasto['emisor'] }}</td>
                    <td>{{ $gasto['folio'] }}</td>
                    <td>${{ number_format($gasto['monto'], 0, ',', '.') }}</td>
                    <td>{{ $gasto['vencimiento'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
(function() {
    let gastos = @json($gastos);
    let colores = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
    let labels = gastos.map(g => g.nombre);
    let data = gastos.map(g => parseInt(g.monto));
    let ctx = document.getElementById('graficoGastos').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Monto',
                data: data,
                backgroundColor: colores
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            responsive: true
        }
    });
    // Leyenda
    let leyendaHtml = '<strong>Leyenda:</strong><ul>';
    labels.forEach((nombre, i) => {
        leyendaHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${colores[i % colores.length]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaHtml += '</ul>';
    document.getElementById('leyendaGastos').innerHTML = leyendaHtml;
})();
</script>
