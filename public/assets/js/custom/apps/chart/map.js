        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("map_chart");
        var colors = am5.ColorSet.new(root, {

        });


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create the map chart
        // https://www.amcharts.com/docs/v5/charts/map-chart/
        var chart = root.container.children.push(am5map.MapChart.new(root, {
            panX: "rotateX",
            projection: am5map.geoMercator()
        }));

        var mode = KTThemeMode.getMode();
        var color = ('dark' === mode) ? '#f9b233' : '#068c94';

        // Create polygon series for the world map
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
        var senegalMap = chart.series.push(am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_senegalHigh,
        }));
        senegalMap.mapPolygons.template.setAll({
            tooltipText: "{name}" ,
            toggleKey: "active",
            interactive: true,
            stateAnimationDuration: 2000,
            fill: am5.color(0xaaaaaa),
            templateField: "polygonSettings"
        });

        // senegalMap.mapPolygons.template.states.create("hover", {
        //     fill: color,
        //     toggleKey: "active",
        // });

        senegalMap.mapPolygons.template.events.on("click", (ev) => {

            var dataItem = ev.target.dataItem;
            var data = dataItem.dataContext;
            colorIndex = Math.floor((Math.random() * 30) + 1);;
            console.log(colorIndex);
            // senegalMap.mapPolygons.template.states.create("active", {
            // fill: colors.getIndex(colorIndex)
            // });
            console.log(ev.target._settings);
            // ev.target._settings.fill=colors.getIndex(colorIndex);
            console.log(senegalMap);
            var zoomAnimation = senegalMap.zoomToDataItem(dataItem,2);

            Promise.all([
                zoomAnimation.waitForStop(),
                am5.net.load("https://cdn.amcharts.com/lib/5/geodata/json/senegalDepartmentsHigh.json",
                    chart)
            ]).then((results) => {
                var geodata = am5.JSONParser.parse(results[1].response);
                countrySeries.setAll({
                    geoJSON: geodata,
                    fill: data.polygonSettings.fill,
                    //toggleKey: "active",
                });
            });
            ev.target._settings.fill=colors.getIndex(colorIndex);
        });

        // Create polygon series for the country map
        // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
        var countrySeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
            visible: false
        }));

        countrySeries.mapPolygons.template.setAll({
            tooltipText: "{name}",
            interactive: true,
            toggleKey: "active",
            fill: am5.color(0xaaaaaa)
        });

        // countrySeries.mapPolygons.template.states.create("hover", {
        //     fill: colors.getIndex(9)
        // });

        // Set up data for countries
        //   var data = [];
        //   for(var id in am5geodata_data_countries2) {
        //     if (am5geodata_data_countries2.hasOwnProperty(id)) {
        //       var country = am5geodata_data_countries2[id];
        //       if (country.maps.length) {
        //         data.push({
        //           id: id,
        //           map: country.maps[0],
        //           polygonSettings: {
        //             fill: colors.getIndex(continents[country.continent_code]),
        //           }
        //         });
        //       }
        //     }
        //   }
        //   senegalMap.data.setAll(data);

        chart.set("zoomControl", am5map.ZoomControl.new(root, {}));
