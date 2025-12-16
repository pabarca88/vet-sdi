
         $(function() {
        var options = {
            chart: {
                height: 250,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '30%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#1CBEBE", "#ff5252","#37DEAB","#374FDE","#EA8132","#DE378D"],
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Medicina general',
                data: [44]
            }, {
                name: 'Vacunatorio  inmunocomprometidos',
                data: [76]
            },

            {
                name: 'Vacunatorio infantil',
                data: [205]
            },

            {
                name: 'Vacunatorio adulto',
                data: [18]
            },

            {
                name: 'Vacunatorio adulto mayor',
                data: [55]
            },

            {
                name: 'Infectología',
                data: [87]
            },

            ],
            xaxis: {
                categories: ['Mensual',],
            },
            
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return " " + val + ""
                    }
                }
            }
        }
        var chart = new ApexCharts(
            document.querySelector("#rech-horas-lab"),
            options
        );
        chart.render();
    });