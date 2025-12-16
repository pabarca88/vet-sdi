
<div class="row">
    <div class="col-md-12">
        <h5>Tratamientos</h5>
        <canvas id="tratamientos"></canvas>
        <div id="leyendaTratamientos"></div>
    </div>
</div>
<script>
(function() {
    // Recibe el array desde Blade
    let tratamientos = @json($mis_tratamientos);
    let tratamientosData = {};
    let colores = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
    let colorIndex = 0;
    tratamientos.forEach(t => {
        let nombre = t.procedimiento || 'Sin nombre';
        if (!tratamientosData[nombre]) {
            tratamientosData[nombre] = { cantidad: 0, valor: 0, color: colores[colorIndex % colores.length] };
            colorIndex++;
        }
        tratamientosData[nombre].cantidad += t.cantidad;
        tratamientosData[nombre].valor += t.total_valor ? parseInt(t.total_valor) : 0;
    });
    let tratLabels = Object.keys(tratamientosData);
    let tratData = tratLabels.map(n => tratamientosData[n].cantidad);
    let tratValor = tratLabels.map(n => tratamientosData[n].valor);
    let tratColors = tratLabels.map(n => tratamientosData[n].color);
    let ctxTrat = document.getElementById('tratamientos').getContext('2d');
    new Chart(ctxTrat, {
        type: 'bar',
        data: {
            labels: tratLabels,
            datasets: [
                {
                    label: 'Cantidad de tratamientos',
                    data: tratData,
                    backgroundColor: tratColors,
                    yAxisID: 'y',
                },
                {
                    label: 'Valor total ($)',
                    data: tratValor,
                    backgroundColor: tratColors.map(c => c+'99'), // más transparente
                    type: 'line',
                    borderColor: tratColors,
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'y1',
                }
            ]
        },
        options: {
            plugins: { legend: { display: true } },
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Cantidad' }
                },
                y1: {
                    beginAtZero: true,
                    position: 'right',
                    grid: { drawOnChartArea: false },
                    title: { display: true, text: 'Valor total ($)' }
                }
            }
        }
    });
    // Leyenda tratamientos
    let leyendaHtml = '<strong>Leyenda:</strong><ul>';
    tratLabels.forEach((nombre, i) => {
        leyendaHtml += `<li><span style=\"display:inline-block;width:20px;height:20px;background:${tratColors[i]};margin-right:5px;\"></span>${nombre} - Cantidad: <b>${tratData[i]}</b> - Valor: <b>$${tratValor[i].toLocaleString('es-CL')}</b></li>`;
    });
    leyendaHtml += '</ul>';
    document.getElementById('leyendaTratamientos').innerHTML = leyendaHtml;
})();
</script>
