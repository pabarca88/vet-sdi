
<div class="container">
    <h2 class="mb-4">Estadística Comparativa: Ingresos vs Gastos</h2>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Ingresos</div>
                <div class="card-body">
                    <h4 class="card-title">${{ number_format($total_ingresos, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Gastos</div>
                <div class="card-body">
                    <h4 class="card-title">${{ number_format($total_gastos, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
    </div>

    <canvas id="comparativaChart" height="100"></canvas>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('comparativaChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Ingresos', 'Gastos'],
            datasets: [{
                label: 'Monto',
                data: [{{ $total_ingresos }}, {{ $total_gastos }}],
                backgroundColor: ['#28a745', '#dc3545']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
