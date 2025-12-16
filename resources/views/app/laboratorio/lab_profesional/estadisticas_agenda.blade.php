<div class="row">
	<div class="col-md-8">
		<h5>Estadísticas de Agenda</h5>
		<canvas id="graficoCitas"></canvas>
		<div id="leyendaCitas"></div>
	</div>
</div>
<script>
(function() {
	let labels = ['Agendadas', 'Realizadas', 'Canceladas', 'Rechazadas'];
	let data = [
		{{ $cantidad_citas_agendadas ?? 0 }},
		{{ $cantidad_citas_realizadas ?? 0 }},
		{{ $cantidad_citas_canceladas ?? 0 }},
		{{ $cantidad_citas_rechazadas ?? 0 }}
	];
	let colores = ["#36A2EB", "#4BC0C0", "#FF6384", "#FFCE56"];
	let ctx = document.getElementById('graficoCitas')?.getContext('2d');
	if(ctx) {
		new Chart(ctx, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: [{
					label: 'Cantidad de citas',
					data: data,
					backgroundColor: colores
				}]
			},
			options: {
				plugins: { legend: { display: false } },
				responsive: true,
				scales: {
					y: { beginAtZero: true, title: { display: true, text: 'Cantidad' } }
				}
			}
		});
	}
	// Leyenda
	let leyendaHtml = '<strong>Leyenda:</strong><ul>';
	labels.forEach((nombre, i) => {
		leyendaHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${colores[i]};margin-right:5px;"></span>${nombre}: ${data[i]}</li>`;
	});
	leyendaHtml += '</ul>';
	let leyendaDiv = document.getElementById('leyendaCitas');
	if(leyendaDiv) leyendaDiv.innerHTML = leyendaHtml;
})();
</script>
