// var devpart;
var theyears = [];
var playing;
var counter = 0;
var stroke;
var all_sector = "all";
var global_devpart = "all";

var global_theyear = false;
var global_region_sel = false;

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
    getodagrant_figures(2025, false);

    // initCounts(); // animation effect
    loadYears();
    initializeDefaultMap();
    initialize_graph();
    initiate_map_heat("#333");

    initializeEvents();
    topoda();
    thetimeseries();

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

function initializeEvents() {
    $(document).on("click", "#the_nav_chart li", function () {
        $(this).siblings().removeClass("small_tab_select");
        $(this).addClass("small_tab_select");
    });

    $(document).on("click", ".closethiswindow", function () {
        var thewindow = $(this).data("window");

        // reset window 
        loadprojects();

        $(document).find(thewindow).hide();
    })

    $(document).on("click", ".loaddist", function () {
        var tof = $(this).data("typeoffinancing");

        $(document).find(".loaddist").removeClass("strongit");
        $(this).addClass("strongit");
        distributiongraph(tof);
    })

    $(document).on("click", ".numofprojs", function () {
        var tof = $(this).data("typeoffinancing");

        $(document).find(".numofprojs").removeClass("strongit");
        $(this).addClass("strongit");
        countofprojects(tof);
    });
}

function loadprojects() {
    get_("default", { status: "all" }, function (data) {
        removemarker();

        display_pin(data);
        $("#show_mpap").addClass("top_nav_selected");
    });
}

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
        loadprojects();
    });
}

$(document).on("click", ".theyear_mpap", function () {
    removemarker();

    global_theyear = $(this).text();

    $(this).parent().parent().siblings().removeClass("selected_timeline");
    $(this).parent().parent().addClass("selected_timeline");

    numberofprojects(global_theyear, global_region_sel);
    get_odas("all", global_theyear);

    getodagrant_figures(global_theyear, false);
});

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

$(document).on("click", ".opendetails", function () {
    var id          = $(this).data("mid");
    var devpart     = $(this).data("devpart");
    var thelogo_pin = $(this).data("logo")+".png";
    var status      = $(this).data("status");
    
    themainnav("hide");

    get_("getdetails", { ii: id }, function (dd) {
        display_details_mpap(dd, id, devpart, status, thelogo_pin);
    });

    var detailsbox = $(document).find(".details_box").addClass("showdiv");

    $("#search_result").modal("hide");
})
// $(document).on("click", "#generatereport", function () {
// $(document).find(".search_result").show();
// });

$(document).on("keydown", "#searchbtnbig", function (e) {
    var enter = e.key;

    if (enter == "Enter") {
        var thekeyword = $(this).val();

        // addblacker(function () {
        //     $(document).find(".search_result").hide("fast");
        // }, "black_it");
        $("#search_result").modal("show");

        // $(document).find(".search_result").show("fast");
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

$(document).on("click", "#the_nav_chart li", function () {
    var thewindow = $(this).data('window');

    $(this).siblings().removeClass("small_tab_select");
    $(this).addClass("small_tab_select");

    // change the window
    // $(document).find(".thewindow").removeClass("showthiswindow");
    // $(document).find("#"+thewindow).addClass("showthiswindow");

    $(document).find(".thewindow").hide();
    $(document).find("#" + thewindow).show();
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

$(document).on("click", "#generatereport_btn", function () {
    // generatereport
    //  console.log(JSON.stringify(prepareParams()));

    console.log($.param(prepareParams()));
});

$(document).on("click", '#displayOnMap', function () {
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

    themainnav("show");
    var detailsbox = $(document).find(".details_box").removeClass("showdiv");
    // detailsbox.animate({
    //     "width": "0" + "%",
    //     "padding-left": "0px",
    //     "padding-right": "0px",
    //     "padding-top": "0px"
    // }, 300);

    get_("default", { status: "all" }, function (data) {
        removemarker();

        display_pin(data);
        $("#show_mpap").addClass("top_nav_selected");
    });
});

var windowopen = false;
$(document).on("click", ".opengenstat", function () {
    if (windowopen) {
        $(document).find(".left_box").removeClass("h-90");
        windowopen = false;
    } else {
        $(document).find(".left_box").addClass("h-90");
        windowopen = true;
    }
});

$(document).on("click", ".showprojs", function () {
    removemarker();

    var devpart = $(this).data('devpart');

    // get_("default", { devpart : devpart }, function(data) {
    //     display_pin(data);
    // });

    var params = {};
    params.development_partner = devpart;

    get_("filter_it", { filters: params }, function (data) {
        var dd = [];
        dd.push(data[0]);
        display_pin(dd);
    });

});

function topoda(region = false, year = false) {
    // theodalist
    let params = Object();
    params.buff = true;

    if (year != false) {
        params.year = year;
    }

    if (region != false) {
        params.region = region;
    }

    $(document).find(".theodalist").children().remove();
    get_("topoda", { filter: params }, function (data) {
        // console.log(data);
        $(document).find(".theodalist").html(data);
    });
}

function numberofprojects(year = false, region = false) {
    let params = Object();
    params.buff = true;

    if (year != false) {
        params.year = year;
    }

    if (region != false) {
        params.region = region;
    }

    $(document).find("#totalnumprojs").text("---");
    $(document).find("#odagrant_projects").text("---");
    $(document).find("#odaloan_projects").text("---");

    get_("allprojects", { filter: params }, function (data) {

        // $(document).find("#count_allprojects").text(data['allprojects']);
        // total_num_projects 
        // $(document).find("#numoflocs").text(data['alllocs']);

        var totalnumprojs = 0;

        for (var i = 0; i <= Object.keys(data.allprojects).length - 1; i++) {
            var displayto = null;
            if (data.allprojects[i].type_of_financing == "loan") {
                displayto = "#odaloan_projects";
                totalnumprojs += data.allprojects[i].cnt;
            } else if (data.allprojects[i].type_of_financing == "grant") {
                displayto = "#odagrant_projects";
                totalnumprojs += data.allprojects[i].cnt;
            }

            $(document).find("#totalnumprojs").text(totalnumprojs);
            $(document).find(displayto).text(data.allprojects[i].cnt);
        }

    });
}

function getodagrant_figures(year = false, region = false) {
    let params = Object();
    params.buff = true;

    if (year != false) {
        params.year = year;
    }

    if (region != false) {
        params.region = region;
    }

    $(document).find("#odagrant").text("---");
    $(document).find("#odaloan").text("---");
    $(document).find("#total_total").text("---");

    get_("getodagrant_figures", { filter: params }, function (data) {
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

        var unit = "B";
        var inbillion_grant = roundToOneDecimal(total_amnt_grant / 1000000000); // grant
        var inbillion_loan = roundToOneDecimal(total_amnt_loan / 1000000000); // loan

        if (inbillion_grant == 0) {
            unit = "M";
            inbillion_grant = roundToOneDecimal(total_amnt_grant / 1000000); // grant
        }

        if (inbillion_loan == 0) {
            unit = "M";
            inbillion_loan = roundToOneDecimal(total_amnt_loan / 1000000); // loan
        }

        var total_l_g = roundToOneDecimal(inbillion_grant + inbillion_loan);

        // $(document).find("#" + display_count).text("");
        $(document).find("#odagrant").text(inbillion_grant + unit);
        $(document).find("#odaloan").text(inbillion_loan + unit);
        $(document).find("#total_total").text(total_l_g + unit);

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
    getHeat(type_of_financing, "amount_per_projects", "Amount of " + type_of_financing + " Distribution per Island Region");
}

function countofprojects(type_of_financing) {
    getHeat(type_of_financing, "countOfProjects", "Number of Projects of " + type_of_financing + " Distribution per Island Region");
}

function getHeat(type_of_financing, apiEndpoint, word) {
    $("#distributiongraph").show();
    disposeRoot("distributiongraph");

    var chart = am4core.create("distributiongraph", am4charts.PieChart);

    $(document).find(".dist_name").html(word);

    get_(apiEndpoint, { type_of_financing: type_of_financing }, function (data) {
        // Add and configure Series
        chart.data = data;

        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "total";
        pieSeries.dataFields.category = "theregion";
        pieSeries.labels.template.disabled = true;

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

    // $("#distributiongraph_region").show();
    $(document).find("#dist_per_reg").show();
    $(document).find(".dist_name_reg").html(type_of_financing);

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

            // if (points == 0) {
            //     points = 1;
            // }

            paint_it(data[o].region, "#67b7dc", points);
        }

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "totalprojects";
        pieSeries.dataFields.category = "region";

        // Let's cut a hole in our Pie chart the size of 40% the radius
        chart.innerRadius = am4core.percent(0);

        // Set up fills
        pieSeries.slices.template.fillOpacity = 1;

        pieSeries.labels.template.disabled = true;
        pieSeries.slices.template.tooltipText = "Region {region}"; //with ${value}
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
                name: "FINANCIAL ASSISTANCE",
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

        series1.columns.template.events.on("click", function (ev) {
            distributiongraph(ev.target.dataItem.dataContext.type_of_financing);
        });

        chart.appear(1000, 100);
        series1.appear();
    });
}

function thetimeseries() {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("thetimeseries");

}

function initiate_map_heat(color) {
    map.on('load', () => {
        barmm_map(false, color, 0, function () {
            var params = Object();
            params.region = "barmm";

            // if (global_theyear == false) {
            //     params.year     = global_theyear;
            // }

            global_region_sel = "barmm";

            get_("filter_it", { filters: params }, function (data) {
                removemarker();

                var dd = [];
                dd.push(data[0]);
                display_pin(dd);

                // get odas 
                topoda("barmm");

                // the numbers 
                numberofprojects(global_theyear, "barmm");

                // amount
                getodagrant_figures(global_theyear, global_region_sel);
            });
        });

        region9_map(false, color, 0, function () {
            var params = Object();
            params.region = 9;

            // if (global_theyear == false) {
            //     params.year     = global_theyear;
            // }

            global_region_sel = 9;

            get_("filter_it", { filters: params }, function (data) {
                removemarker();

                var dd = [];
                dd.push(data[0]);
                display_pin(dd);

                // get odas 
                topoda(9);

                // the numbers 
                numberofprojects(global_theyear, 9);

                // amount
                getodagrant_figures(global_theyear, global_region_sel);

            });
        });

        region10_map(false, color, 0, function () {
            var params = Object();
            params.region = 10;

            // if (global_theyear == false) {
            //     params.year     = global_theyear;
            // }

            global_region_sel = 10;

            get_("filter_it", { filters: params }, function (data) {
                removemarker();

                var dd = [];
                dd.push(data[0]);
                display_pin(dd);

                // get odas 
                topoda(10);

                // the numbers 
                numberofprojects(global_theyear, 10);

                // amount
                getodagrant_figures(global_theyear, global_region_sel);
            });
        });

        region11_map(false, color, 0, function () {
            var params = Object();
            params.region = 11;

            // if (global_theyear == false) {
            //     params.year     = global_theyear;
            // }

            global_region_sel = 11;

            get_("filter_it", { filters: params }, function (data) {
                removemarker();

                var dd = [];
                dd.push(data[0]);
                display_pin(dd);

                // get odas 
                topoda(11);

                // the numbers 
                numberofprojects(global_theyear, 11);

                // amount
                getodagrant_figures(global_theyear, global_region_sel);
            });
        });

        region12_map(false, color, 0, function () {
            var params = Object();
            params.region = 12;

            // if (global_theyear == false) {
            //     params.year     = global_theyear;
            // }    

            global_region_sel = 12;

            get_("filter_it", { filters: params }, function (data) {
                removemarker();

                var dd = [];
                dd.push(data[0]);
                display_pin(dd);

                // get odas 
                topoda(12);

                // the numbers 
                numberofprojects(global_theyear, 12);

                // amount
                getodagrant_figures(global_theyear, global_region_sel);
            });
        });

        region13_map(false, color, 0, function () {
            var params = Object();
            params.region = 13;

            // if (global_theyear == false) {
            //     params.year     = global_theyear;
            // }

            global_region_sel = 13;

            get_("filter_it", { filters: params }, function (data) {
                removemarker();

                var dd = [];
                dd.push(data[0]);

                display_pin(dd);

                // get odas 
                topoda(13);

                // the numbers 
                numberofprojects(global_theyear, 13);

                // amount
                getodagrant_figures(global_theyear, global_region_sel);
            });
        });
    });
}

function paint_it(region, color, opacity) {
    map.setPaintProperty("region" + region, "fill-color", color);
    map.setPaintProperty("region" + region, "fill-opacity", opacity);
}