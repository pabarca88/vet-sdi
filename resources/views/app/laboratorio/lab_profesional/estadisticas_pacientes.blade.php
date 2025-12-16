<div class="row">
	<div class="col-md-8">
		<h5>Pacientes atendidos por profesional</h5>
		<canvas id="graficoPacientes"></canvas>
		<div id="leyendaPacientes"></div>
	</div>
</div>
<script>
(function() {
	let datos = @json($mis_pacientes ?? []);
	let labels = datos.map(p => p.profesional);
	let data = datos.map(p => p.cantidad_pacientes);
	let colores = ["#36A2EB", "#FF6384", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
	let ctx = document.getElementById('graficoPacientes')?.getContext('2d');
	if(ctx) {
		new Chart(ctx, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: [{
					label: 'Cantidad de pacientes',
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
		leyendaHtml += `<li><span style=\"display:inline-block;width:20px;height:20px;background:${colores[i % colores.length]};margin-right:5px;\"></span>${nombre}: ${data[i]}</li>`;
	});
	leyendaHtml += '</ul>';
	let leyendaDiv = document.getElementById('leyendaPacientes');
	if(leyendaDiv) leyendaDiv.innerHTML = leyendaHtml;
})();
</script>
