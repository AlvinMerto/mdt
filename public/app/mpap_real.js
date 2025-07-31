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
        
        for (var i = 0; i <= thelen-1; i++) {
            var tof     = data.loangrant_amount[i].type_of_financing;
            var display = null;
            var display_count = null;
            if ( tof == "grant") {
               display = "odagrant";
               display_count = "grantprojects";
            } else if (tof == "loan") {
                display = "odaloan";
                display_count = "loanprojects";
            }
            $(document).find("#"+display_count).text(data.loangrant[i].thecount);
            $(document).find("#"+display).text(formatNumber(data.loangrant_amount[i].amount));
        }
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
        layout: root.verticalLayout
    }));

    var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50
    }));

    get_("loan_grants", {}, function (data) {
        // var data = [
        //     { year: "Loan", income: 23.5, expenses: 18.1 },
        //     { year: "Grant", income: 26.2, expenses: 22.8 }
        // ];

        var data = data;

        var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "type_of_financing",
            renderer: am5xy.AxisRendererY.new(root, {
                cellStartLocation: 0.1,
                cellEndLocation: 0.9,
                minorGridEnabled: true
            })
        }));

        yAxis.data.setAll(data);

        var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
            min: 0,
            renderer: am5xy.AxisRendererX.new(root, {
                strokeOpacity: 0.1,
                minGridDistance: 70
            })
        }));

        var series1 = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: "total",
            xAxis: xAxis,
            yAxis: yAxis,
            valueXField: "total",
            categoryYField: "type_of_financing",
            tooltip: am5.Tooltip.new(root, {
                pointerOrientation: "horizontal",
                labelText: "[bold]{name}[/]\n{categoryY}: {valueX}"
            })
        }));

        series1.columns.template.setAll({ height: am5.percent(70) });

        // var series2 = chart.series.push(am5xy.LineSeries.new(root, {
        //     name: "Expenses",
        //     xAxis: xAxis,
        //     yAxis: yAxis,
        //     valueXField: "expenses",
        //     categoryYField: "year",
        //     tooltip: am5.Tooltip.new(root, {
        //         pointerOrientation: "horizontal",
        //         labelText: "[bold]{name}[/]\n{categoryY}: {valueX}"
        //     })
        // }));

        // series2.strokes.template.setAll({ strokeWidth: 2 });

        // series2.bullets.push(function () {
        //     return am5.Bullet.new(root, {
        //         locationY: 0.5,
        //         sprite: am5.Circle.new(root, {
        //             radius: 5,
        //             stroke: series2.get("stroke"),
        //             strokeWidth: 2,
        //             fill: root.interfaceColors.get("background")
        //         })
        //     });
        // });

        legend.data.setAll(chart.series.values);

        chart.set("cursor", am5xy.XYCursor.new(root, { behavior: "zoomY" })).lineX.set("visible", false);

        series1.data.setAll(data);
        // series2.data.setAll(data);

        series1.appear();
        // series2.appear();
        chart.appear(1000, 100);

        series1.columns.template.events.on("click", function (ev) {
            distributiongraph(ev.target.dataItem.dataContext.type_of_financing);
        });
    });
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