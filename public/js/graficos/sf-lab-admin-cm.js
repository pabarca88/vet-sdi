$(document).ready(function() {
    // [ Support tracker ] start
    $(function() {
        var options = {
            chart: {
                height: 100,
                type: 'bar',
                sparkline: {
                    enabled: true
                },
            },
            colors: ["#1CBEBE", "#ff5252"],
            plotOptions: {
                bar: {
                    columnWidth: '70%',
                    distributed: true
                }
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 0
            },
            series: [{
                name: 'Total',
                data: [203, 102,]
            }],
            xaxis: {
                categories: ['Reclamos', 'Felicitaciones',],
            }
        }
        var chart = new ApexCharts(
            document.querySelector("#sf-lab"),
            options
        );
        chart.render()
    });
    // [ Support tracker ] end
});
