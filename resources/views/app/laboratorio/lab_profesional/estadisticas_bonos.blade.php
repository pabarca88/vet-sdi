
<div class="row">
    <div class="col-md-12">
        <h5>Venta de bonos</h5>
        <canvas id="ventasPorBonos"></canvas>
        <div id="leyendaBonos"></div>
    </div>
</div>
<script>
(function() {
    // Recibe el array desde Blade
    let bonos = @json($bonos_utilizados);
    let colores = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
    let colorIndex = 0;
    // Agrupar por tipo de bono
    let tipos = {};
    bonos.forEach(b => {
        // let nombre = b.tipo_bono ? b.tipo_bono.nombre : 'Sin tipo';
        if(b.id_tipo_bono == 1){
            var nombre = 'Bono Consulta';
        } else if(b.id_tipo_bono == 2){
            var nombre = 'Bono Examen';
        } else {
            var nombre = 'Sin tipo';
        }

        if (!tipos[nombre]) {
            tipos[nombre] = { total: 0, cantidad: 0, color: colores[colorIndex % colores.length] };
            colorIndex++;
        }
        tipos[nombre].total += b.valor_atencion ? parseInt(b.valor_atencion) : 0;
        tipos[nombre].cantidad += 1;
    });
    let tipoLabels = Object.keys(tipos);
    let tipoData = tipoLabels.map(n => tipos[n].total);
    let tipoCantidad = tipoLabels.map(n => tipos[n].cantidad);
    let tipoColors = tipoLabels.map(n => tipos[n].color);
    // Gráfico de bonos por tipo
    let ctxBono = document.getElementById('ventasPorBonos')?.getContext('2d');
    if(ctxBono) {
        new Chart(ctxBono, {
            type: 'bar',
            data: {
                labels: tipoLabels,
                datasets: [
                    {
                        label: 'Monto total por tipo',
                        data: tipoData,
                        backgroundColor: tipoColors
                    },
                    {
                        label: 'Cantidad de bonos',
                        data: tipoCantidad,
                        backgroundColor: tipoColors.map(c => c + '80'),
                        type: 'bar',
                        yAxisID: 'y-cantidad'
                    }
                ]
            },
            options: {
                plugins: { legend: { display: true } },
                responsive: true,
                scales: {
                    y: { beginAtZero: true, title: { display: true, text: 'Monto ($)' } },
                    'y-cantidad': {
                        beginAtZero: true,
                        position: 'right',
                        title: { display: true, text: 'Cantidad' },
                        grid: { drawOnChartArea: false }
                    }
                }
            }
        });
    }
    // Leyenda
    let leyendaHtml = '<strong>Leyenda:</strong><ul>';
    tipoLabels.forEach((nombre, i) => {
        leyendaHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${tipoColors[i]};margin-right:5px;"></span>${nombre} - ${tipos[nombre].cantidad} bonos</li>`;
    });
    leyendaHtml += '</ul>';
    let leyendaDiv = document.getElementById('leyendaBonos');
    if(leyendaDiv) leyendaDiv.innerHTML = leyendaHtml;
})();
</script>


