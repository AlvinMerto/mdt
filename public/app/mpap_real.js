// var devpart;
var theyears = [];
var playing;
var counter = 0;
var stroke;
var all_sector = "all";
var global_devpart = "all";

am4core.color("#e63946"),
    am4core.color("#f1faee"),
    am4core.color("#a8dadc"),
    am4core.color("#457b9d"),
    am4core.color("#1d3557")

var colors = {
    "1": "#D0E6F6",
    "2": "#A3C8EF",
    "3": "#7AAAE0",
    "4": "#518BCC",
    "5": "#316EB5",
    "6": "#245C9A",
    "7": "#174B7F",
    "8": "#0D3C66",
    "9": "#072F4F",
    "10": "#011D32"
};

var global_region = [9, 10, 11, 12, 13, "barmm"];

$(document).ready(function () {
    // initiate widgets
    numberofprojects();
    getodagrant_figures();

    // initCounts(); // animation effect
    loadYears();
    initializeDefaultMap();
    initialize_graph();
    initiate_map_heat("#333");
    project_dist();
    stacked_sector();

    // thetimeseries();

    // map.on("load", function () {
    //     create_line([
    //                     [125.48, 7.14],
    //                     [125.55, 7.14],
    //                     [125.65, 7.20],
    //                     [125.60, 7.30],
    //                     [125.48, 7.26],
    //                     [125.48, 7.14]
    //                 ], "davaoroad", "#000", 4);
    // });

});

function initCounts() {
    animateCount("#count_allprojects", $("#count_allprojects").text(), 2000);
    animateCount("#grantprojects", $("#grantprojects").text(), 2000);
    animateCount("#loanprojects", $("#loanprojects").text(), 2000);
    animateCount("#odaloan", $("#odaloan").text(), 2000);
    animateCount("#odagrant", $("#odagrant").text(), 2000);
}

function loadYears() {
    $("#mpap_years li").each((_, el) => {
        theyears.push($(el).text().trim());
    });
}

function initializeDefaultMap() {
    map.on("load", function () {
        get_("default", { status: "all" }, function (data) {
            removemarker();

            display_pin(data);
            $("#show_mpap").addClass("top_nav_selected");
        });
    });
}

$(document).on("click", "#mpap_years li", function () {
    const year = $(this).text().trim();
    $("#showingyear").text(year).removeAttr("style");
    get_odas("all", year);
})

$(document).on("mouseover", "#mpap_years li", function () {
    var clist = $(this).data("clist");

    $(document).find("." + clist).siblings().removeClass("selectedyear");
    $(document).find("." + clist).addClass("selectedyear");
});

$(document).on("click", "#getoda_play", function () {
    get_odas("all", theyears[counter]);
    $("#showingyear").text(theyears[counter]).removeAttr("style");
    playing = setInterval(() => {
        $("#showingyear").text(theyears[counter]).removeAttr("style");
        get_odas("all", theyears[counter]);
        counter++;
    }, 5000);
});

$(document).on("mouseover", ".markerhover", function () {
    var thisid = $(this).data("markhov");

    $("." + thisid).addClass("themarker_selected");
});

$(document).on("mouseout", ".markerhover", function () {
    var thisid = $(this).data("markhov");

    $("." + thisid).removeClass("themarker_selected");
});

$(document).on("focus", "#searchbtnbig", function () {
    $(document).find(".search_box").css({ "background-color": "#fff" });
});

$(document).on("blur", "#searchbtnbig", function () {
    $(document).find(".search_box").removeAttr("style");
});

// $(document).on("click", "#generatereport", function () {
// $(document).find(".search_result").show();
// });

$(document).on("keydown", "#searchbtnbig", function (e) {
    var enter = e.key;

    if (enter == "Enter") {
        var thekeyword = $(this).val();

        addblacker(function () {
            $(document).find(".search_result").hide("fast");
        }, "black_it");

        $(document).find(".search_result").show("fast");
        // thesearchresults
        $(document).find("#thesearchresults").children().remove();
        get_("thesearchresults", { keyword: thekeyword }, function (data) {
            $(data).appendTo("#thesearchresults");
        });
    }
});

$(document).on("click", "#showinlist", function () {
    $(document).find(".search_result").show("fast");
    // thesearchresults
    $(document).find("#thesearchresults").children().remove();

    addblacker(function () {
        $(document).find(".search_result").hide("fast");
    }, "black_it");

    get_("searchresults", { filters: prepareParams() }, function (data) {
        $(data).appendTo("#thesearchresults");
    });
});

$(document).on("change", "#sector_change", function () {
    all_sector = $(this).val();

    removemarker();

    var params = {};
    params.status = "all";

    if (all_sector != "all") {
        params.sector = all_sector;
    }

    if (global_devpart != "all") {
        params.devpart = global_devpart;
    }

    get_("default", params, function (data) {
        display_pin(data);
    });
});

$(document).on("change", "#devpart_change", function () {
    removemarker();

    global_devpart = $(this).val();

    var params = {};
    params.status = "all";

    if (global_devpart != "all") {
        params.devpart = global_devpart;
    }

    if (all_sector != "all") {
        params.sector = all_sector;
    }

    get_("default", params, function (data) {
        // removemarker();
        display_pin(data);
    });
});

// $(document).on("change","#displayOnMap", function() {

// });

$(document).on("click", '#generatereport_btn, #displayOnMap', function () {
    removemarker();

    // region_select
    // devpart_select
    // sector_select
    // status_select

    get_("filter_it", { filters: prepareParams() }, function (data) {
        var dd = [];
        dd.push(data[0]);
        display_pin(dd);
    });

});

$(document).on("click", ".theclosebtn", function () {
    var detailsbox = $(document).find(".details_box");


    detailsbox.animate({
        "width": "0" + "%",
        "padding-left": "0px",
        "padding-right": "0px",
        "padding-top": "0px"
    }, 300);

    get_("default", { status: "all" }, function (data) {
        removemarker();

        display_pin(data);
        $("#show_mpap").addClass("top_nav_selected");
    });
});

function numberofprojects(year = false) {
    let params = Object();
    params.buff = true;

    if (year != false) {
        params.year = year;
    }

    get_("allprojects", params, function (data) {
        $(document).find("#count_allprojects").text(data['allprojects']);
        $(document).find("#numoflocs").text(data['alllocs']);
    });
}

function getodagrant_figures(year = false) {
    let params = Object();
    params.buff = true;

    if (year != false) {
        params.year = year;
    }

    get_("getodagrant_figures", params, function (data) {
        var thelen = data.loangrant_amount.length;
        var total_amnt_grant = 0; // grant
        var total_amnt_loan = 0; // loan

        for (var i = 0; i <= thelen - 1; i++) {
            var tof = data.loangrant_amount[i].type_of_financing;
            var display = null;
            var display_count = null;

            if (tof == "grant") {
                display = "odagrant";
                display_count = "grantprojects";
                total_amnt_grant += data.loangrant_amount[i].amount;
            } else if (tof == "loan") {
                display = "odaloan";
                display_count = "loanprojects";
                total_amnt_loan += data.loangrant_amount[i].amount;
            }


            // formatNumber(data.loangrant_amount[i].amount)
            // data.loangrant[i].thecount

        }

        var inbillion_grant = roundToOneDecimal(total_amnt_grant / 1000000000); // grant
        var inbillion_loan = roundToOneDecimal(total_amnt_loan / 1000000000); // loan

        if (inbillion_grant == 0) {
            inbillion_grant = roundToOneDecimal(total_amnt_grant / 1000000); // grant
        }

        if (inbillion_loan == 0) {
            inbillion_loan = roundToOneDecimal(total_amnt_loan / 1000000); // loan
        }

        var total_l_g = roundToOneDecimal(inbillion_grant + inbillion_loan);

        // $(document).find("#" + display_count).text("");
        $(document).find("#odagrant").text(inbillion_grant + "B");
        $(document).find("#odaloan").text(inbillion_loan + "B");
        $(document).find("#total_total").text(total_l_g + "B");

        // $(document).find("#odaloan").text(data['loangrant']);
        // $(document).find("#odagrant").text(data['loangrant_amount']);
    });
}

function prepareParams() {

    var reg_sel = $(document).find("#region_select").val();
    var dev_sel = $(document).find("#devpart_select").val();
    var sec_sel = $(document).find("#sector_select").val();
    var sta_sel = $(document).find("#status_select").val();

    var params = {};

    if (reg_sel != "none") {
        params.region = reg_sel;
    }

    if (dev_sel != "none") {
        params.development_partner = dev_sel;
    }

    if (sec_sel != "none") {
        params.sector = sec_sel;
    }

    if (sta_sel != "none") {
        params.status = sta_sel;
    }
    console.log(params);
    return params;
}
function get_odas(status, year) {
    removemarker();

    // get_("filter_it", { filter : params}, function(data) {
    //     display_pin(data);
    // });

    get_("default", { status: status, theyear: year }, function (data) {
        display_pin(data);
    });
}

function removemarker() {
    if (marker.length > 0) {
        marker.forEach(m => m.remove());
        marker = [];
    }
}

function disposeRoot(containerId) {
    am5.registry.rootElements.forEach(root => {
        if (root.dom.id === containerId) {
            root.dispose();
        }
    });
}

function initialize_graph() {
    am5.ready(function () {
        initMainGraph();
    });
}

function distributiongraph(type_of_financing) {
    $("#distributiongraph").show();
    disposeRoot("distributiongraph");

    var chart = am4core.create("distributiongraph", am4charts.PieChart);

    get_("number_of_projects", { type_of_financing: type_of_financing }, function (data) {
        // Add and configure Series
        chart.data = data;

        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "total";
        pieSeries.dataFields.category = "theregion";

        pieSeries.slices.template.events.on("hit", function (ev) {
            distributiongraph_region(ev.target.dataItem.dataContext.theregion, type_of_financing);
            removemarker();
        });
    });

}

function stacked_sector() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("stacked_sector");

    var myTheme = am5.Theme.new(root);

    myTheme.rule("Grid", ["base"]).setAll({
        strokeOpacity: 0.1
    });

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root),
        myTheme
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panY",
        wheelY: "zoomY",
        paddingLeft: 0,
        layout: root.verticalLayout
    }));

    var data = [{
        "year": "2021",
        "europe": 2.5,
        "namerica": 2.5,
        "asia": 2.1,
        "lamerica": 1,
        "meast": 0.8,
        "africa": 0.4
    }, {
        "year": "2022",
        "europe": 2.6,
        "namerica": 2.7,
        "asia": 2.2,
        "lamerica": 0.5,
        "meast": 0.4,
        "africa": 0.3
    }, {
        "year": "2023",
        "europe": 2.8,
        "namerica": 2.9,
        "asia": 2.4,
        "lamerica": 0.3,
        "meast": 0.9,
        "africa": 0.5
    }]


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var yRenderer = am5xy.AxisRendererY.new(root, {});
    var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "year",
        renderer: yRenderer,
        tooltip: am5.Tooltip.new(root, {})
    }));

    yRenderer.grid.template.setAll({
        location: 1
    })

    yAxis.data.setAll(data);

    var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        min: 0,
        maxPrecision: 0,
        renderer: am5xy.AxisRendererX.new(root, {
            minGridDistance: 40,
            strokeOpacity: 0.1
        })
    }));

    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
    }));

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            stacked: true,
            xAxis: xAxis,
            yAxis: yAxis,
            baseAxis: yAxis,
            valueXField: fieldName,
            categoryYField: "year"
        }));

        series.columns.template.setAll({
            tooltipText: "{name}, {categoryY}: {valueX}",
            tooltipY: am5.percent(90)
        });
        series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();

        series.bullets.push(function () {
            return am5.Bullet.new(root, {
                sprite: am5.Label.new(root, {
                    text: "{valueX}",
                    fill: root.interfaceColors.get("alternativeText"),
                    centerY: am5.p50,
                    centerX: am5.p50,
                    populateText: true
                })
            });
        });

        legend.data.push(series);
    }

    makeSeries("Europe", "europe");
    makeSeries("North America", "namerica");
    makeSeries("Asia", "asia");
    makeSeries("Latin America", "lamerica");
    makeSeries("Middle East", "meast");
    makeSeries("Africa", "africa");


    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    chart.appear(1000, 100);
}
function project_dist() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("pie_map");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(
        am5percent.PieChart.new(root, {
            endAngle: 270
        })
    );

    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(
        am5percent.PieSeries.new(root, {
            valueField: "value",
            categoryField: "category",
            endAngle: 270
        })
    );

    series.states.create("hidden", {
        endAngle: -90
    });

    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
        category: "Lithuania",
        value: 501.9
    }, {
        category: "Czechia",
        value: 301.9
    }, {
        category: "Ireland",
        value: 201.1
    }, {
        category: "Germany",
        value: 165.8
    }, {
        category: "Australia",
        value: 139.9
    }, {
        category: "Austria",
        value: 128.3
    }, {
        category: "UK",
        value: 99
    }]);

    series.appear(1000, 100);
}

function distributiongraph_region(region, type_of_financing) {
    if (region != "Mindanao Specific") {
        alert("Cannot show data that is not Mindanao Specific");
        return;
    }

    $("#distributiongraph_region").show();
    disposeRoot("distributiongraph_region");

    var root = am5.Root.new("distributiongraph_region");

    var chart = am4core.create("distributiongraph_region", am4charts.PieChart);

    get_("sum_of_projects_per_region", { type_of_financing: type_of_financing }, function (data) {
        chart.data = data;

        var thevalues = [];

        for (var i = 0; i <= data.length - 1; i++) {
            thevalues.push(data[i].totalprojects);
        }

        var min = Math.min(...thevalues);
        var max = Math.max(...thevalues);

        for (var o = 0; o <= data.length - 1; o++) {
            let normalized = (data[o].totalprojects - min) / (max - min);
            let percentage = (normalized * 100);
            let points = percentage / 100;

            paint_it(data[o].region, "#67b7dc", points);
        }

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "totalprojects";
        pieSeries.dataFields.category = "region";

        // Let's cut a hole in our Pie chart the size of 40% the radius
        chart.innerRadius = am4core.percent(40);

        // Set up fills
        pieSeries.slices.template.fillOpacity = 1;

        // pieSeries.labels.template.disabled = true;
        // pieSeries.ticks.template.disabled = true;

        var hs = pieSeries.slices.template.states.getKey("hover");
        hs.properties.scale = 1;
        hs.properties.fillOpacity = 0.5;

        pieSeries.slices.template.events.on("over", function (ev) {
            const data = ev.target.dataItem.dataContext;

            if (stroke != null) {
                // if (map.getLayer(stroke)) {
                map.removeLayer(stroke);
                // }
            }

            map.addLayer({
                id: 'newstroke',
                type: 'line',
                source: "region" + data.region,
                paint: {
                    'line-color': '#000',
                    'line-width': 2
                }
            });

            stroke = "newstroke";
        });
        // chart.legend = new am4charts.Legend();
    });
}

function initMainGraph() {
    disposeRoot("theloangrantdiv");

    var root = am5.Root.new("theloangrantdiv");
    root.setThemes([am5themes_Animated.new(root)]);

    var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        paddingLeft: 0,
        layout: root.verticalLayout
    }));

    var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
    }));

    get_("loan_grants", {}, function (data) {
        console.log(data);
        // var data = data;

        // var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
        //     categoryField: "type_of_financing",
        //     renderer: am5xy.AxisRendererY.new(root, {
        //         cellStartLocation: 0.1,
        //         cellEndLocation: 0.9,
        //         minorGridEnabled: true
        //     })
        // }));

        // yAxis.data.setAll(data);

        // var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        //     min: 0,
        //     renderer: am5xy.AxisRendererX.new(root, {
        //         strokeOpacity: 0.1,
        //         minGridDistance: 70
        //     })
        // }));

        // var series1 = chart.series.push(am5xy.ColumnSeries.new(root, {
        //     name: "total",
        //     xAxis: xAxis,
        //     yAxis: yAxis,
        //     valueXField: "total",
        //     categoryYField: "type_of_financing",
        //     tooltip: am5.Tooltip.new(root, {
        //         pointerOrientation: "horizontal",
        //         labelText: "[bold]{name}[/]\n{categoryY}: {valueX}"
        //     })
        // }));

        // series1.columns.template.setAll({ height: am5.percent(70) });

        // legend.data.setAll(chart.series.values);

        // chart.set("cursor", am5xy.XYCursor.new(root, { behavior: "zoomY" })).lineX.set("visible", false);

        // series1.data.setAll(data);

        // series1.appear();

        // chart.appear(1000, 100);

        // series1.columns.template.events.on("click", function (ev) {
        //     distributiongraph(ev.target.dataItem.dataContext.type_of_financing);
        // });

        // ================

        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            minorGridEnabled: true,
            minGridDistance: 60
        });
        var xAxis = chart.xAxes.push(
            am5xy.CategoryAxis.new(root, {
                categoryField: "type_of_financing",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            })
        );
        xRenderer.grid.template.setAll({
            location: 1
        })

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(
            am5xy.ValueAxis.new(root, {
                min: 0,
                extraMax: 0.1,
                renderer: am5xy.AxisRendererY.new(root, {
                    strokeOpacity: 0.1
                })
            })
        );

        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/

        var series1 = chart.series.push(
            am5xy.ColumnSeries.new(root, {
                name: "Income",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "total",
                categoryXField: "type_of_financing",
                tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: "Total {categoryX} : {valueY} {info}"
                })
            })
        );

        series1.columns.template.setAll({
            tooltipY: am5.percent(10),
            templateField: "columnSettings"
        });

        series1.data.setAll(data);

        chart.set("cursor", am5xy.XYCursor.new(root, {}));

        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
        );
        legend.data.setAll(chart.series.values);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
        series1.appear();

        series1.columns.template.events.on("click", function (ev) {
            distributiongraph(ev.target.dataItem.dataContext.type_of_financing);
        });
    });
}

function thetimeseries() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("thetimeseries");

}

function initiate_map_heat(color) {
    map.on('load', () => {
        barmm_map(false, color, 0);
        region9_map(false, color, 0);
        region10_map(false, color, 0);
        region11_map(false, color, 0);
        region12_map(false, color, 0);
        region13_map(false, color, 0);
    });

    // global_region.forEach((k)=> {
    //     map.on("mousemove", 'region'+k, (e) => {
    //         paint_it(k,"#000",0.6);
    //     });

    //     map.on("mouseleave", 'region'+k, (e)=> {
    //         paint_it(k,"#000",0);
    //     });

    //     map.on("click","region"+k, (e) => {

    //     });
    // });       
}

function paint_it(region, color, opacity) {
    map.setPaintProperty("region" + region, "fill-color", color);
    map.setPaintProperty("region" + region, "fill-opacity", opacity);
}