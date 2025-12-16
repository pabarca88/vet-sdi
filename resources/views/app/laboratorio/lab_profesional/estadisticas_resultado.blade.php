
<div class="row">
    <div class="col-md-6">
        <h5>Ventas por producto</h5>
        <canvas id="ventasPorProducto"></canvas>
        <div id="leyendaProducto"></div>
    </div>
    <div class="col-md-6">
        <h5>Pacientes atendidos</h5>
        <canvas id="ventasPorPaciente"></canvas>
        <div id="leyendaPaciente"></div>
    </div>
    <div class="col-md-6">
        <h5>Pacientes atendiendose</h5>
        <canvas id="pacientesAtendiendose"></canvas>
        <div id="leyendaAtendiendose"></div>
    </div>
    <div class="col-md-6">
        <h5>Pacientes agendados</h5>
        <canvas id="pacientesAgendados"></canvas>
        <div id="leyendaAgendados"></div>
    </div>
    <div class="col-md-6">
        <h5>Profesionales horas trabajadas</h5>
        <canvas id="profesionalesHorasTrabajadas"></canvas>
        <div id="leyendaProfesionales"></div>
    </div>
    <div class="col-md-6">
        <h5>Pacientes informados por redes sociales</h5>
        <canvas id="pacientesRedesSociales"></canvas>
        <div id="leyendaRedesSociales"></div>
    </div>
    <div class="col-md-6">
        <h5>Pacientes cancelados</h5>
        <canvas id="pacientesCancelados"></canvas>
        <div id="leyendaCancelados"></div>
    </div>
</div>
<script>
(function() {
    // Recibe el array desde Blade
    let ventas = @json($mis_ventas);
    let pacientesPorProfesional = @json($mis_pacientes);

    // --- Ventas por producto (igual que antes) ---
    let productos = {};
    let colores = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
    let colorIndex = 0;
    ventas.forEach(v => {
        let nombre = v.producto ? v.producto.nombre : 'Sin nombre';
        if (!productos[nombre]) {
            productos[nombre] = { total: 0, color: colores[colorIndex % colores.length] };
            colorIndex++;
        }
        productos[nombre].total += v.producto ? v.producto.precio_venta : 0;
    });
    let prodLabels = Object.keys(productos);
    let prodData = prodLabels.map(n => productos[n].total);
    let prodColors = prodLabels.map(n => productos[n].color);
    let ctxProd = document.getElementById('ventasPorProducto').getContext('2d');
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
    // Leyenda productos
    let leyendaHtml = '<strong>Leyenda:</strong><ul>';
    prodLabels.forEach((nombre, i) => {
        leyendaHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${prodColors[i]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaHtml += '</ul>';
    document.getElementById('leyendaProducto').innerHTML = leyendaHtml;

    // --- Pacientes atendidos por profesional ---
    let profLabels = pacientesPorProfesional.map(p => p.profesional);
    let profData = pacientesPorProfesional.map(p => p.cantidad_pacientes);
    let profColors = profLabels.map((_, i) => colores[i % colores.length]);
    let ctxPac = document.getElementById('ventasPorPaciente').getContext('2d');
    new Chart(ctxPac, {
        type: 'bar',
        data: {
            labels: profLabels,
            datasets: [{
                label: 'Pacientes atendidos',
                data: profData,
                backgroundColor: profColors
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            responsive: true
        }
    });
    // Leyenda profesionales
    let leyendaPacHtml = '<strong>Leyenda:</strong><ul>';
    profLabels.forEach((nombre, i) => {
        leyendaPacHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${profColors[i]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaPacHtml += '</ul>';
    document.getElementById('leyendaPaciente').innerHTML = leyendaPacHtml;

    // --- Pacientes atendiendose ---
    let pacientesAtendiendose = @json($mis_pacientes_atendiendo);
    let atendiendoseLabels = pacientesAtendiendose.map(p => p.profesional);
    let atendiendoseData = pacientesAtendiendose.map(p => p.cantidad_pacientes);
    let atendiendoseColors = atendiendoseLabels.map((_, i) => colores[i % colores.length]);
    let ctxAtendiendose = document.getElementById('pacientesAtendiendose').getContext('2d');
    new Chart(ctxAtendiendose, {
        type: 'bar',
        data: {
            labels: atendiendoseLabels,
            datasets: [{
                label: 'Pacientes atendiendose',
                data: atendiendoseData,
                backgroundColor: atendiendoseColors
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            responsive: true
        }
    });
    // Leyenda pacientes atendiendose
    let leyendaAtendiendoseHtml = '<strong>Leyenda:</strong><ul>';
    atendiendoseLabels.forEach((nombre, i) => {
        leyendaAtendiendoseHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${atendiendoseColors[i]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaAtendiendoseHtml += '</ul>';
    document.getElementById('leyendaAtendiendose').innerHTML = leyendaAtendiendoseHtml;

    // --- Pacientes agendados ---
    let pacientesAgendados = @json($mis_pacientes_agendados);
    let agendadosLabels = pacientesAgendados.map(p => p.profesional);
    let agendadosData = pacientesAgendados.map(p => p.cantidad_pacientes);
    let agendadosColors = agendadosLabels.map((_, i) => colores[i % colores.length]);
    let ctxAgendados = document.getElementById('pacientesAgendados').getContext('2d');
    new Chart(ctxAgendados, {
        type: 'bar',
        data: {
            labels: agendadosLabels,
            datasets: [{
                label: 'Pacientes agendados',
                data: agendadosData,
                backgroundColor: agendadosColors
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            responsive: true
        }
    });
    // Leyenda pacientes agendados
    let leyendaAgendadosHtml = '<strong>Leyenda:</strong><ul>';
    agendadosLabels.forEach((nombre, i) => {
        leyendaAgendadosHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${agendadosColors[i]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaAgendadosHtml += '</ul>';
    document.getElementById('leyendaAgendados').innerHTML = leyendaAgendadosHtml;

    // --- Profesionales horas trabajadas ---
    let profesionalesHoras = @json($mis_profesionales_horas_trabajadas ?? []);
    let horasLabels = profesionalesHoras.map(p => p.profesional);
    let horasData = profesionalesHoras.map(p => parseInt(p.minutos_trabajados));
    let horasColors = horasLabels.map((_, i) => colores[i % colores.length]);
    let ctxHoras = document.getElementById('profesionalesHorasTrabajadas').getContext('2d');
    new Chart(ctxHoras, {
        type: 'bar',
        data: {
            labels: horasLabels,
            datasets: [{
                label: 'Minutos trabajados',
                data: horasData,
                backgroundColor: horasColors
            }]
        },
        options: {
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let idx = context.dataIndex;
                            let label = horasLabels[idx] || '';
                            let minutos = horasData[idx];
                            let horas = Math.floor(minutos / 60);
                            let mins = minutos % 60;
                            let texto = `${label}: ${horas}h ${mins}m`;
                            return texto;
                        }
                    }
                }
            },
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Minutos trabajados'
                    }
                }
            }
        }
    });
    // Leyenda profesionales horas trabajadas
    let leyendaHorasHtml = '<strong>Leyenda:</strong><ul>';
    horasLabels.forEach((nombre, i) => {
        leyendaHorasHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${horasColors[i]};margin-right:5px;"></span>${nombre} (${profesionalesHoras[i].horas_trabajadas} hs)</li>`;
    });
    leyendaHorasHtml += '</ul>';
    document.getElementById('leyendaProfesionales').innerHTML = leyendaHorasHtml;

    // --- Pacientes informados por tipos de difusion ---
    let pacientesRedes = @json($pacientes_por_procedencia ?? []);
    let redesLabels = pacientesRedes.map(p => p.id_procedencia_paciente || 'Sin especificar');
    let redesData = pacientesRedes.map(p => p.cantidad_pacientes);
    let redesColors = redesLabels.map((_, i) => colores[i % colores.length]);   
    let ctxRedes = document.getElementById('pacientesRedesSociales').getContext('2d');
    new Chart(ctxRedes, {
        type: 'bar',
        data: {
            labels: redesLabels,
            datasets: [{
                label: 'Pacientes informados',
                data: redesData,
                backgroundColor: redesColors
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            responsive: true
        }
    });
    // Leyenda pacientes redes sociales
    let leyendaRedesHtml = '<strong>Leyenda:</strong><ul>';
    redesLabels.forEach((nombre, i) => {
        leyendaRedesHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${redesColors[i]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaRedesHtml += '</ul>';
    document.getElementById('leyendaRedesSociales').innerHTML = leyendaRedesHtml;

    // --- Pacientes cancelados ---
    let pacientesCancelados = @json($mis_pacientes_cancelados ?? []);
    let canceladosLabels = pacientesCancelados.map(p => p.profesional);
    let canceladosData = pacientesCancelados.map(p => p.cantidad_pacientes);

    let canceladosColors = canceladosLabels.map((_, i) => colores[i % colores.length]);   
    let ctxCancelados = document.getElementById('pacientesCancelados').getContext('2d');
    new Chart(ctxCancelados, {
        type: 'bar',
        data: {
            labels: canceladosLabels,
            datasets: [{
                label: 'Pacientes cancelados',
                data: canceladosData,
                backgroundColor: canceladosColors
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            responsive: true
        }
    });
    // Leyenda pacientes cancelados
    let leyendaCanceladosHtml = '<strong>Leyenda:</strong><ul>';
    canceladosLabels.forEach((nombre, i) => {
        leyendaCanceladosHtml += `<li><span style="display:inline-block;width:20px;height:20px;background:${canceladosColors[i]};margin-right:5px;"></span>${nombre}</li>`;
    });
    leyendaCanceladosHtml += '</ul>';
    document.getElementById('leyendaCancelados').innerHTML = leyendaCanceladosHtml;
})();
</script>
