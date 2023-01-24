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

var labelColor = KTUtil.getCssVariableValue("--kt-gray-500");
var borderColor = KTUtil.getCssVariableValue("--kt-gray-200");
var baseColor = KTUtil.getCssVariableValue("--kt-primary");
var secondaryColor = KTUtil.getCssVariableValue("--kt-gray-300");

var options = {
    series: [
        {
            name: "Expeditions",
            data: []
        },
    ],
    chart: {
        fontFamily: "inherit",
        type: "bar",
        height: 350,
        toolbar: {
            show: false,
        },
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: ["30%"],
            endingShape: "rounded",
        },
    },
    legend: {
        show: false,
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
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        labels: {
            style: {
                colors: labelColor,
                fontSize: "12px",
            },
        },
    },
    yaxis: {
        labels: {
            style: {
                colors: labelColor,
                fontSize: "12px",
            },
        },
    },
    fill: {
        opacity: 1,
    },
    states: {
        normal: {
            filter: {
                type: "none",
                value: 0,
            },
        },
        hover: {
            filter: {
                type: "none",
                value: 0,
            },
        },
        active: {
            allowMultipleDataPointsSelection: false,
            filter: {
                type: "none",
                value: 0,
            },
        },
    },
    tooltip: {
        style: {
            fontSize: "12px",
        },
        y: {
            formatter: function (val) {
                return "$" + val + " thousands";
            },
        },
    },
    colors: [baseColor, secondaryColor],
    grid: {
        borderColor: borderColor,
        strokeDashArray: 4,
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
};

var chart = new ApexCharts(document.querySelector("#perYear_chart"), options);
//chart.render();

//Fetch data from the API using Axios
// axios
//     .get("/getExpeditionsPerYear")
//     .then(function (response) {
//         var data = response.data;
//         options.series.data = data;
//         //console.log(options.series.data);
//         //return data;
//         chart.render();
//     })
//     .catch(function (error) {
//         console.log(error);
//     });

// console.log(data)

async function getData() {
    try {
        const response = await axios.get('/getExpeditionsPerYear')
        let data = response.data;
        options.series.data = data;
    } catch (error) {
        console.error(error)
    }
}