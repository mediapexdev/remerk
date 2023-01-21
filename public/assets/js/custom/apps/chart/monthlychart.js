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

var options = {
    series: [
        {
            name: "Expedition",
            data: [],
        }
    ],
    chart: {
        fontFamily: 'inherit',
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
    },
    fill: {
        opacity: 1,
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return val ; //+" expéditions" ;
            },
        },
    },
};

var chart = new ApexCharts(document.querySelector("#monthly_chart"), options);

// Fetch data from the API using Axios
axios.get('/getMonthlyExpeditionCount')
.then(function (response) {
    var data = response.data;
    options.series[0].data = data.map(function(monthlyExpedition) {
        return monthlyExpedition.total;
    });
    chart.updateOptions(options);
    chart.render();
})
.catch(function (error) {
    console.log(error);})