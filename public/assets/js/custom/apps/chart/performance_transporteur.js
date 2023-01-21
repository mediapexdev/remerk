am5.ready(async function () {
    // Create root element
    var root = am5.Root.new("rk_performance_transporteur");
    // hide amchart logo
    root._logo.dispose();
    // const response = await axios.get("/getExpeditions");
    // let expeditions = response.data;
    // console.log(expeditions);
    // let today = new Date().toISOString().slice(0,10);
    // });
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([am5themes_Animated.new(root)]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
        })
    );

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
    cursor.lineY.set("visible", false);

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });

    var xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
            maxDeviation: 0.3,
            categoryField: "Expeditions",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {}),
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 0.3,
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            sequencedInterpolation: true,
            categoryXField: "Expedition",
        })
    );

    series.columns.template.setAll({
        width: am5.percent(120),
        fillOpacity: 0.9,
        strokeOpacity: 0,
    });
    series.columns.template.adapters.add("fill", (fill, target) => {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    series.columns.template.adapters.add("stroke", (stroke, target) => {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    series.columns.template.set("draw", function (display, target) {
        var w = target.getPrivate("width", 0);
        var h = target.getPrivate("height", 0);
        display.moveTo(0, h);
        display.bezierCurveTo(w / 4, h, w / 4, 0, w / 2, 0);
        display.bezierCurveTo(w - w / 4, 0, w - w / 4, h, w, h);
    });

    // Set data
    var data = [];
    expeditions.forEach(element => {
        if(element.expeditions){
        data.push({value:element.length, category:element.type});
        }
    });
    xAxis.data.setAll(data);
    series.data.setAll(data);

    // Make stuff animate on load
    series.appear(1000);
    chart.appear(1000, 100);
});
