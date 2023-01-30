var monthlyChartWidget = (function () {
    var chart = {
        self: null,
        rendered: false,
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
        "Décembre",
    ];
    var initChart = async function (chart) {
        var element = document.getElementById("monthly_chart");

        if (!element) {
            alert("element not found");
        }
        const baseUrl = "/getExpeditionsPerMonth";
        const result = await axios.get(baseUrl);
        let expeditions = result.data;
        console.log(expeditions);

        //var height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue("--kt-gray-500");
        var borderColor = KTUtil.getCssVariableValue(
            "--kt-border-dashed-color"
        );
        var baseprimaryColor = KTUtil.getCssVariableValue("--kt-primary");
        var lightprimaryColor = KTUtil.getCssVariableValue("--kt-primary");
        var basesuccessColor = KTUtil.getCssVariableValue("--kt-success");
        var lightsuccessColor = KTUtil.getCssVariableValue("--kt-success");

        var options = {
            series: [
                {
                    name: "Expeditions",
                    data: expeditions,
                },
            ],
            chart: {
                type: "bar",
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
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            xaxis: {
                categories: months,
            },
            yaxis: {
                title: {
                    text: "$ (thousands)",
                },
            },
            fill: {
                opacity: 1,
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$ " + val + " thousands";
                    },
                },
            },
        };

        chart.self = new ApexCharts(element, options);

        // Set timeout to properly get the parent elements width
        setTimeout(function () {
            chart.self.render();
            chart.rendered = true;
        }, 200);
    };

    // Public methods
    return {
        init: async function () {
            initChart(chart);

            // Update chart on theme mode change
            KTThemeMode.on("kt.thememode.change", function () {
                if (chart.rendered) {
                    chart.self.destroy();
                }
                initChart(chart);
            });
        },
    };
})();

// Webpack support
if (typeof module !== "undefined") {
    module.exports = monthlyChartWidget;
}

// On document ready
KTUtil.onDOMContentLoaded(function () {
    monthlyChartWidget.init();
});
