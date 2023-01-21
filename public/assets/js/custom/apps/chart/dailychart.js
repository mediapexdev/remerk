"use strict";

// Class definition
var dailyChartWidget = function () {
    var chart = {
        self: null,
        rendered: false
    };

    // Private methods
    var initChart = async function(chart) {
        var element = document.getElementById("dailyChart");

        if (!element) {
            alert('element not found');
        }
        const baseUrl = '/getTodayExpeditions';
        const result  = await axios.get(baseUrl);
        let data      = result.data;
        
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
                data: data //données
            }],
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {

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
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseprimaryColor, basesuccessColor]
            },
            xaxis: {
                categories: ['08:00 - 12:00','12:00 - 16:00','16:00 - 18:00','18:00 - 20:00'],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                tickAmount: 6,
                labels: {
                    rotate: 0,
                    rotateAlways: true,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    position: 'front',
                    stroke: {
                        color: [baseprimaryColor, basesuccessColor],
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                max: 10,
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
    module.exports = dailyChartWidget;
}

// On document ready
KTUtil.onDOMContentLoaded(function() {
    dailyChartWidget.init();
});
