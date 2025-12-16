
<div class="row">
    <div class="col-md-6">
        <h5>Ventas por producto</h5>
        <canvas id="cantidadPorProducto"></canvas>
        <div id="leyendaProductos"></div>
    </div>
</div>

<script>
(function() {
    // Recibe el array desde Blade
    let ventas = @json($mis_ventas);

    // --- Cantidad vendida por producto ---
    let productos = {};
    let colores = ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF", "#FF9F40", "#C9CBCF"];
    let colorIndex = 0;
    ventas.forEach(v => {
        let nombre = v.producto ? v.producto.nombre : 'Sin nombre';
        let cantidad = v.stock || 1; // Si no existe stock, asume 1
        if (!productos[nombre]) {
            productos[nombre] = { cantidad: 0, color: colores[colorIndex % colores.length] };
            colorIndex++;
        }
        productos[nombre].cantidad += cantidad;
    });
    let prodLabels = Object.keys(productos);
    let prodData = prodLabels.map(n => productos[n].cantidad);
    let prodColors = prodLabels.map(n => productos[n].color);
    let ctxProd = document.getElementById('cantidadPorProducto').getContext('2d');
    new Chart(ctxProd, {
        type: 'bar',
        data: {
            labels: prodLabels,
            datasets: [{
                label: 'Cantidad vendida',
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
    document.getElementById('leyendaProductos').innerHTML = leyendaHtml;

})();
</script>
