var root = null;

function progress_status_pie() {
 //am5.ready(function() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    if (root != null) {
        root.dispose();
    }

    root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Generate and set data
    // https://www.amcharts.com/docs/v5/charts/radar-chart/#Setting_data

    // Create chart
        // https://www.amcharts.com/docs/v5/charts/radar-chart/
        var chart = root.container.children.push(am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            wheelX: false,
            wheelY: false
        }));

        // Create axes and their renderers
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_axes
        var xRenderer = am5radar.AxisRendererCircular.new(root, {});
            xRenderer.labels.template.setAll({
            radius: 10
        });

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            maxDeviation: 0,
            categoryField: "category",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5radar.AxisRendererRadial.new(root, {})
        }));

    // progress_status
    get_("progress_status", {a:1} , function(data) {
        var finaldata = [];
         // Create series
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_series
        
        var thelbls = ["pipeline","ongoing","completed","onhold"];
        var sector  = ["agriculture","itt","gid","infra","srcd"];

        for (var i = 0; i <= sector.length-1; i++) {
            var dd = [];

            for(var o = 0; o <=thelbls.length-1; o++) {
                var objs = { category : sector[i], value : data[sector[i]][thelbls[o]] };

                dd.push(objs);
                finaldata.push(objs);

                var series = chart.series.push(am5radar.RadarColumnSeries.new(root, {
                    stacked: true,
                    name: sector[o] ,
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    categoryXField: "category"
                }));

                series.set("stroke", root.interfaceColors.get("background"));

                series.columns.template.setAll({
                    width: am5.p100,
                    strokeOpacity: 0.1,
                    tooltipText: "{name}: {valueY}"
                });

                series.data.setAll(objs);
                series.appear(1000);
            }
            console.log(dd);
            //finaldata.push(dd);
        }

        xAxis.data.setAll(finaldata);

        // Animate chart
        // https://www.amcharts.com/docs/v5/concepts/animations/#Initial_animation
        chart.appear(1000, 100);
        
    });
}

function kpi_bar() {
   
}

function bar_chart() {
    var bar_chart = am5.Root.new("chartdiv_bar");

    const myTheme = am5.Theme.new(bar_chart);

    myTheme.rule("AxisLabel", ["minor"]).setAll({
        dy:1,
        strokeOpacity: 0
    });

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    bar_chart.setThemes([
        am5themes_Animated.new(bar_chart),
        myTheme
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = bar_chart.container.children.push(am5xy.XYChart.new(bar_chart, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        paddingLeft:0,
    }));

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.DateAxis.new(bar_chart, {
        maxDeviation: 0,
        baseInterval: {
            timeUnit: "day",
            count: 1
        },
        renderer: am5xy.AxisRendererX.new(bar_chart, {
            minorGridEnabled:false,
            minorLabelsEnabled:false,
        }),

        tooltip: am5.Tooltip.new(bar_chart, {}),
    }));

    xAxis.set("minorDateFormats", {
        "day":"dd",
        "month":"MM"
    });
    
    xAxis.get("renderer").labels.template.setAll({
        oversizedBehavior: "truncate",
        maxWidth: 150
    });

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(bar_chart, {
        renderer: am5xy.AxisRendererY.new(bar_chart, {
            minorGridEnabled:false,
            minorLabelsEnabled:false,
        })
    }));

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.ColumnSeries.new(bar_chart, {
        name: "Series",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "value",
        valueXField: "date",
        tooltip: am5.Tooltip.new(bar_chart, {
            labelText: "{valueY}"
        })
    }));

    series.columns.template.setAll({ strokeOpacity: 0 , fill:"#d74e4e"})

    var data = generateDatas(30);
    series.data.setAll(data);

    xAxis.hide();
    yAxis.hide();

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
    
}

function agenda_chart() {
    return;
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var agenda = am5.Root.new("agenda_chart");


    var myTheme = am5.Theme.new(agenda);

    myTheme.rule("Grid", ["base"]).setAll({
    strokeOpacity: 0.1
    });


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    agenda.setThemes([
        am5themes_Animated.new(agenda),
        myTheme
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = agenda.container.children.push(
    am5xy.XYChart.new(agenda, {
        panX: false,
        panY: false,
        wheelX: "none",
        wheelY: "none",
        paddingLeft: 0
    })
    );


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var yRenderer = am5xy.AxisRendererY.new(agenda, {
    minGridDistance: 30,
    minorGridEnabled: true
    });
    yRenderer.grid.template.set("location", 1);

    var yAxis = chart.yAxes.push(
    am5xy.CategoryAxis.new(agenda, {
        maxDeviation: 0,
        categoryField: "country",
        renderer: yRenderer
    })
    );

    var xAxis = chart.xAxes.push(
    am5xy.ValueAxis.new(agenda, {
        maxDeviation: 0,
        min: 0,
        renderer: am5xy.AxisRendererX.new(agenda, {
        visible: true,
        strokeOpacity: 0.1,
        minGridDistance: 80
        })
    })
    );


    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
    am5xy.ColumnSeries.new(agenda, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueXField: "value",
        sequencedInterpolation: true,
        categoryYField: "country"
    })
    );

    var columnTemplate = series.columns.template;

    columnTemplate.setAll({
    draggable: true,
    cursorOverStyle: "pointer",
    tooltipText: "drag to rearrange",
    cornerRadiusBR: 10,
    cornerRadiusTR: 10,
    strokeOpacity: 0
    });
    columnTemplate.adapters.add("fill", (fill, target) => {
    return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    columnTemplate.adapters.add("stroke", (stroke, target) => {
    return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    columnTemplate.events.on("dragstop", () => {
    sortCategoryAxis();
    });

    // Get series item by category
    function getSeriesItem(category) {
    for (var i = 0; i < series.dataItems.length; i++) {
        var dataItem = series.dataItems[i];
        if (dataItem.get("categoryY") == category) {
        return dataItem;
        }
    }
    }


    // Axis sorting
    function sortCategoryAxis() {
    // Sort by value
    series.dataItems.sort(function (x, y) {
        return y.get("graphics").y() - x.get("graphics").y();
    });

    var easing = am5.ease.out(am5.ease.cubic);

    // Go through each axis item
    am5.array.each(yAxis.dataItems, function (dataItem) {
        // get corresponding series item
        var seriesDataItem = getSeriesItem(dataItem.get("category"));

        if (seriesDataItem) {
        // get index of series data item
        var index = series.dataItems.indexOf(seriesDataItem);

        var column = seriesDataItem.get("graphics");

        // position after sorting
        var fy =
            yRenderer.positionToCoordinate(yAxis.indexToPosition(index)) -
            column.height() / 2;

        // set index to be the same as series data item index
        if (index != dataItem.get("index")) {
            dataItem.set("index", index);

            // current position
            var x = column.x();
            var y = column.y();

            column.set("dy", -(fy - y));
            column.set("dx", x);

            column.animate({ key: "dy", to: 0, duration: 600, easing: easing });
            column.animate({ key: "dx", to: 0, duration: 600, easing: easing });
        } else {
            column.animate({ key: "y", to: fy, duration: 600, easing: easing });
            column.animate({ key: "x", to: 0, duration: 600, easing: easing });
        }
        }
    });

    // Sort axis items by index.
    // This changes the order instantly, but as dx and dy is set and animated,
    // they keep in the same places and then animate to true positions.
    yAxis.dataItems.sort(function (x, y) {
        return x.get("index") - y.get("index");
    });
    }

    // Set data
    var data = [{
    country: "USA",
    value: 2025
    }, {
    country: "China",
    value: 1882
    }, {
    country: "Japan",
    value: 1809
    }, {
    country: "Germany",
    value: 1322
    }, {
    country: "UK",
    value: 1122
    }];

    yAxis.data.setAll(data);
    series.data.setAll(data);


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);

}

    var date = new Date();
        date.setHours(0, 0, 0, 0);
    var value = 100;

    function generateData() {
        value = Math.round((Math.random() * 10 - 5) + value);
        am5.time.add(date, "day", 1);
        return {
            date: date.getTime(),
            value: value
        };
    }

    function generateDatas(count) {
        var data = [];
        for (var i = 0; i < count; ++i) {
            data.push(generateData());
        }
        return data;
    }
