
am5.ready(async function () {
    // Create root element
    const baseUrl='/getMatieres';
    const res=await axios.get(baseUrl)
    let matieres=res.data;
    
    // console.log(expeditions);
    // console.log(getExp);
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("kt_amcharts_3");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root),
    ]);
    if(KTThemeMode.getMode())
    if("dark" === KTThemeMode.getMode()){
        root.setThemes([
            am5themes_Animated.new(root),
            am5themes_Dark.new(root)
        ]);
    }
    else{
        root.setThemes([
            am5themes_Animated.new(root),
        ]);
    }
    // KTThemeMode.on("kt.thememode.change", function(){
    //     if("dark" === KTThemeMode.getMode()){
    //         root.setThemes([
    //             am5themes_Animated.new(root),
    //             am5themes_Dark.new(root)
    //         ]);
    //     }
    //     else{
    //         root.setThemes([
    //             am5themes_Animated.new(root),
    //         ]);
    //     }
    // });
        

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
        layout: root.verticalLayout
    }));

    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
        alignLabels: true,
        calculateAggregates: true,
        valueField: "value",
        categoryField: "category"
    }));

    series.slices.template.setAll({
        strokeWidth: 3,
        stroke: am5.color(0xffffff)
    });

    series.labelsContainer.set("paddingTop", 30)

    // Set up adapters for variable slice radius
    // https://www.amcharts.com/docs/v5/concepts/settings/adapters/
    series.slices.template.adapters.add("radius", function (radius, target) {
        var dataItem = target.dataItem;
        var high = series.getPrivate("valueHigh");

        if (dataItem) {
            var value = target.dataItem.get("valueWorking", 0);
            return radius * value / high
        }
        return radius;
    });

    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    // series.data.setAll([{
    //     value: 30,
    //     category: "One"
    // }, {
    //     value: 9,
    //     category: "Two"
    // }, {
    //     value: 10,
    //     category: "Three"
    // }, {
    //     value: 5,
    //     category: "Four"
    // }, {
    //     value: 4,
    //     category: "Five"
    // }, {
    //     value: 3,
    //     category: "Six"
    // }]);
    let data=[];
    matieres.forEach(element => {
        if(element.expeditions.length>0){
            console.log(element.type+': '+element.expeditions.length);
        data.push({value:element.expeditions.length,category:element.type});
        }
    });
    // dataChart=expeditions.map.
    series.data.setAll(data);

    // Create legend
    // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
    var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50,
        marginTop: 15,
        marginBottom: 15
    }));

    legend.data.setAll(series.dataItems);

    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);

}); // end am5.ready()