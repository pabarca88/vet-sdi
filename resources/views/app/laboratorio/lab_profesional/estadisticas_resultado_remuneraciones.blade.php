<div class="row">
    <div class="col-md-12">
        <h5>Remuneración total: ${{ number_format($total_valor, 0, ',', '.') }}</h5>
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
