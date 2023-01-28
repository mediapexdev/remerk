var monthlyChartWidget = function () {
    var chart = {
        self: null,
        rendered: false
    };
    var months = [
        "Janvier",
        "Février",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Août",
        "Septembre",
        "Octobre",
        "Novembre",
        "Décembre"
    ];
    var initChart = async function(chart) {
        var element = document.getElementById("monthly_chart");

        if (!element) {
            alert('element not found');
        }
        const baseUrl   = '/getExpeditionsPerMonth';
        const result    = await axios.get(baseUrl);
        let expeditions = result.data;
        console.log(expeditions);
        
        //var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor        = KTUtil.getCssVariableValue('--kt-gray-500');
        var borderColor       = KTUtil.getCssVariableValue('--kt-border-dashed-color');
        var baseprimaryColor  = KTUtil.getCssVariableValue('--kt-primary');
        var lightprimaryColor = KTUtil.getCssVariableValue('--kt-primary');
        var basesuccessColor  = KTUtil.getCssVariableValue('--kt-success');
        var lightsuccessColor = KTUtil.getCssVariableValue('--kt-success');

        var options = {
            series: [{
                name: 'Expeditions',
                data: expeditions //données
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "55%",
                    endingShape: "rounded",
                },
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.5,
                    opacityTo: 0.2,
                    stops: [15, 120, 100]
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: [baseprimaryColor, basesuccessColor]
            },
            xaxis: {
                categories: months,
            },
            yaxis: {
                max: 25,
                min: 0,
                tickAmount: 5,
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    } 
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                } 
            },
            colors: [lightprimaryColor, lightsuccessColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: [baseprimaryColor, basesuccessColor],
                strokeWidth: 3
            }
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function() {
            chart.self.render();
            chart.rendered = true;
        }, 200);      
    }

    // Public methods
    return {
        init: async function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function() {                
                if (chart.rendered) {
                    chart.self.destroy();
                }
                initChart(chart);
            });
        }   
    }
}();

// Webpack support
if (typeof module !== 'undefined') {
    module.exports = monthlyChartWidget;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    monthlyChartWidget.init();
});
