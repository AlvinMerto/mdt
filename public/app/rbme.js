var agendaid = null;
var showingprojects = false;

// for playing of the rbme kpis
var playing_rbme = false;
// var theyears     = ["2025","2024","2023","2022","2021"];
var theyears = [];
var counter = 0;

var outpudid = null;
let ajaxRequests = [];

var selected = false;

// end 

$(document).on("click", "#showprojects", function () {
    if (showingprojects == false) {
        $(this).text("Showing projects");
        showingprojects = true;
        get_projects(agendaid);
    } else {
        $(this).text("Show projects");
        showingprojects = false;

        if (projects.length > 0) {
            projects.forEach(project => project.remove());
            projects = []; // clear the array
        }
    }
});

$(document).on("click", ".iconagenda", function (e) {
    agendaid = $(this).data('maid');

    $(document).find("#rbmetitlename").show();
    $(document).find("#rbmetitlename").html("Agenda "+agendaid+" Progress Overview");

    map.flyTo({zoom:7, center: [125.17278219762514,7.852526199835467]});
    mindanao_agenda(agendaid);
});

$(document).on("click", ".hidewindow", function () {
    var hidewindow = $(this).data("hidewindow");
    var showwindow = $(this).data("showdwindow");

    $(document).find(hidewindow).hide("fast");
    $(document).find(showwindow).show("fast");

    ma_status();
});

$(document).on("click", ".peroutcome", function () {
    var outcomeid = $(this).data("outcomeid");

    if (selected == outcomeid) { return; }

    selected = outcomeid;

    $(this).siblings(".peroutcome").removeClass("selectedoutcome");
    $(this).addClass("selectedoutcome");
    $(document).find(".yeardiv").remove();

    $(document).find(".kpis").remove();
    $(document).find("#kpis_" + outcomeid).remove();

    $(document).find("#rbmetitlename").show();
    $(document).find("#rbmetitlename").html("Indicator Overview");

    get_("get_kpis", { outcomeid: outcomeid, region_id_selected: region_id_selected }, function (data) {

        $("<ul>").attr({ id: "kpis_" + outcomeid, class: "kpis" }).appendTo("#outcome_" + outcomeid);

        for (var io = 0; io <= Object.keys(data.values).length - 1; io++) {
            $("<li class='perkpi' data-outputid='" + data.values[io].outputid + "'> <div class='row'>  <div class='col-md-2'><span class='badge badge-light-success fs-base' style='background-color:#fff;'>" + data.values[io].thevalue + "</span></div> <div class='col-md-10'>" + data.values[io].kpi + " </div> </div> </li>").appendTo("#kpis_" + outcomeid);
        }

    });

    get_per_outcome(null, outcomeid);
});

$(document).on("click", ".perkpi", function () {
    reset_map();
    removemarker();

    outpudid = $(this).data('outputid');
    var dis_id = $(this).parent().parent().attr("id");

    $(document).find(".yeardiv").remove();

    get_("trend", { outpudid: outpudid }, function (data) {
        $(data).insertAfter("#" + dis_id);

        var yrs = $(document).find("#yearselect li");

        yrs.each(function (idx, ele) {
            var txt = yrs.eq(idx).text();
            theyears.push(txt.trim());
        });
    });

    $(document).find(".perkpi").removeClass("perkpi_selected");
    $(this).addClass("perkpi_selected");

    get_kpi_info(2025, outpudid);
});

$(document).on("click", "#yearselect li", function () {
    reset_map();
    removemarker();

    var theyear = $(this).text();

    $(this).siblings().removeClass("selectedyear");
    $(this).addClass("selectedyear");

    counter = $(this).index();

    get_kpi_info(theyear, outpudid);

});

$(document).on("click", "#play_rbme", function () {
    if (playing_rbme == false) {
        playing_rbme = true;

        $(this).removeClass("bi-play-circle-fill").addClass("bi-stop-circle-fill");

        // get_kpi_info(theyears[counter], outpudid);

        playing_rbme = setInterval(function () {
            reset_map();
            removemarker();

            if (counter == theyears.length - 1) {
                counter = 0;
            } else {
                counter++;
            }

            get_kpi_info(theyears[counter], outpudid);

        }, 3000);
    } else {
        $(this).addClass("bi-play-circle-fill").removeClass("bi-stop-circle-fill");
        clearInterval(playing_rbme);
        playing_rbme = false;
    }
});


function mindanao_agenda(theid) {
    removemarker();
    macro_indicators("remove");
    reset_map();

    // var theid  = agendaid = $(this).data('maid');

    // var clickid = e.target.id;

    $(this).siblings().removeClass("selected_li_agenda");
    $(this).addClass("selected_li_agenda");

    var a = $(document).find("#agenda_info_show");
    a.removeAttr("class");
    a.show("fast");
    a.addClass("agenda_" + theid + "_div");

    get_("get_agenda_details", { agendaid: theid }, function (data) {

        display_info(data);
        thereadables(data);
        challenges_peragenda(data.agendadetails);

        var width = 300;
        var height = 0;

        var nine, ten, ele, twe, thir, bar;

        for (var pa = 0; pa <= Object.keys(data.peragenda).length - 1; pa++) {
            switch (data.peragenda[pa].thelocation) {
                case "9": nine = data.peragenda[pa].thevalue;
                case "10": ten = data.peragenda[pa].thevalue;
                case "11": ele = data.peragenda[pa].thevalue;
                case "12": twe = data.peragenda[pa].thevalue;
                case "13": thir = data.peragenda[pa].thevalue;
                case "barmm": bar = data.peragenda[pa].thevalue;
            }

            //   var box = box_situation(width+"px", height+"px", "region_9_box");
            var box = box_situation(width + "px", height + "px", "region_" + data.peragenda[pa].thelocation + "_box");
            var m = new mapboxgl.Marker(box).setLngLat(region[data.peragenda[pa].thelocation]).addTo(map);
            marker.push(m);

            var colorloading = make_loading("region_" + data.peragenda[pa].thelocation + "_box", data.peragenda[pa].thevalue, "Region " + data.peragenda[pa].thelocation);

            map.setPaintProperty("region" + data.peragenda[pa].thelocation, "fill-color", colorloading);
        }
    });
}

function challenges_peragenda(data) {
    $(document).find("#thechallenges").children().remove();
    for (var i = 0; i <= data.length - 1; i++) {
        $("<li class='" + the_status(data[i].thevalue)['loading'] + "_text'> " + the_status(data[i].thevalue)['label'] + " </li>").appendTo("#thechallenges");
    }
}

function get_projects(agendaid) {
    get_("the_projects", { agendaid: agendaid }, function (data) {
        for (var o = 0; o <= Object.keys(data.pins).length - 1; o++) {
            var status = data.pins[o].minda_status;
            var thelogo_pin = data.pins[o].logo + ".png";
            var id = data.pins[o].masterid;
            var devpart = data.pins[o].abbr;
            devpart = devpart.replace(/\s/g, "");

            var pin = map_pin(thelogo_pin, function (id, devpart, status, lat, lng) {
                var detailsbox = $(document).find(".details_box");

                $(document).find("#" + devpart).siblings().removeClass("li_selected");
                $(document).find("#" + devpart).addClass("li_selected");

                get_("getdetails", { ii: id }, function (dd) {
                    $(document).find("#projecttitle").text(dd[0].title);
                    $(document).find("#thedescs").text(dd[0].description);
                });

                detailsbox.animate({
                    "left": "350",
                    "width": "25" + "%"
                }, 300);
            }, id, devpart, status, data.pins[o].lat, data.pins[o].lng);

            const projs = new mapboxgl.Marker(pin).setLngLat([data.pins[o].lng, data.pins[o].lat]).addTo(map);

            projects.push(projs);
        }
    });
}

function reset_map() {
    map.setPaintProperty("region9", 'fill-color', '#000000');
    map.setPaintProperty("region10", 'fill-color', '#000000');
    map.setPaintProperty("region11", 'fill-color', '#000000');
    map.setPaintProperty("region12", 'fill-color', '#000000');
    map.setPaintProperty("region13", 'fill-color', '#000000');
    map.setPaintProperty("regionbarmm", 'fill-color', '#000000');
}

function thereadables(data) {
    $(document).find("#agendanum").html(data.agenda[0].agendatitle);
    $(document).find("#theagenda").html(data.agenda[0].agendaname);
    $(document).find("#agendalogo").attr({ "src": url + "/storage/images/ma_icons/" + data.agenda[0].thelogo });
    $(document).find("#agendatagline").html(data.agenda[0].thequote);
    $(document).find("#agendagoal").html(data.agenda[0].thegoal);
}

function display_info(data, apto = "theoutcomes") {
    $(document).find("#" + apto).children().remove();

    // <div class='col-md-2'><span class='badge badge-light-success fs-base'><i class='ki-outline ki-arrow-up fs-5 text-success ms-n1'></i>" + data.outcomes[oc].thevalue + "</span></div>
    for (var oc = 0; oc <= Object.keys(data.outcomes).length - 1; oc++) {
        $("<div class='col-md-12 peroutcome row' id='outcome_" + data.outcomes[oc].outcomeid + "' data-outcomeid='" + data.outcomes[oc].outcomeid + "'><div class='col-md-10'><h5>" + data.outcomes[oc].theoutcome + "</div> </h5></div>").appendTo("#" + apto);
    }
}

function get_kpi_info(theyear_, outputid_) {
    var width = 300;
    var height = 0;

    reset_map();
    removemarker();

    get_("get_kpi_info", { theyear: theyear_, outputid: outputid_ }, function (data, jqXHR) {
        // if (playing_rbme) {
        $("#yearselect li").removeClass("selectedyear");
        $("#yearselect li").eq(counter).addClass("selectedyear");

        $("#thelines li").removeClass("selectedyear");
        $("#thelines li").eq(counter).addClass("selectedyear");
        // }

        for (var io = 0; io <= Object.keys(data.values).length - 1; io++) {
            var box = box_situation(width + "px", height + "px", "region_" + data.values[io].thelocation + "_box");
            var m = new mapboxgl.Marker(box).setLngLat(region[data.values[io].thelocation]).addTo(map);
            marker.push(m);

            var colorloading = make_loading("region_" + data.values[io].thelocation + "_box", 
                                            data.values[io].thevalue, 
                                            "Region " + data.values[io].thelocation,
                                            formatNumber(data.values[io].baseline),
                                            formatNumber(data.values[io].target));

            map.setPaintProperty("region" + data.values[io].thelocation, "fill-color", colorloading);
        }

    });
}

function get_per_outcome(theyear, outcomeid) {
    var width = 300;
    var height = 0;
    
    reset_map();
    removemarker();
    
    get_("get_per_outcome", {year : theyear , outcomeid : outcomeid}, function (data) {
        for (var io = 0; io <= Object.keys(data.values).length - 1; io++) {
            var box = box_situation(width + "px", height + "px", "region_" + data.values[io].thelocation + "_box");
            var m = new mapboxgl.Marker(box).setLngLat(region[data.values[io].thelocation]).addTo(map);
            marker.push(m);

            var colorloading = make_loading("region_" + data.values[io].thelocation + "_box", data.values[io].thevalue, "Region " + data.values[io].thelocation);

            map.setPaintProperty("region" + data.values[io].thelocation, "fill-color", colorloading);
        }
    });
}

function ma_status() {
    removemarker();

    var width = 300;
    var height = 0;

    get_("ma_status", { year : 2025}, function (data) {

        for (var i = 0; i <= data.length - 1; i++) {
            var box = box_situation(width + "px", height + "px", "region_" + data[i].thelocation + "_box");
            var m = new mapboxgl.Marker(box).setLngLat(region[data[i].thelocation]).addTo(map);
            marker.push(m);

            var colorloading = make_loading("region_" + data[i].thelocation + "_box", data[i].thevalue, "Region " + data[i].thelocation, );
            map.setPaintProperty("region" + data[i].thelocation, "fill-color", colorloading);
        }
    });

}

function make_loading(app_to, percent, label, baseline = false, target = false) {
    var status = the_status(percent);

    var thetable = "";

    if (baseline != false && target != false) {
        thetable = "<div style='display: flex;justify-content: space-between;'> <span> Baseline <br/> "+baseline+" </span> <span> Target <br/> "+target+" </span> </div>";
    }

    $("<div class='ma_desc'> <p class='lbl_p'> " + label + " </p> "+thetable+" <div class='the_loading_div'> <div class='ma_loading " + status['loading'] + "' style='width:" + percent + "%'>  </div> <span> " + percent + "% </span> </div><p> " + status['label'] + " </p> </div>").appendTo("#" + app_to);

    return status['color'];
}

function the_fire() {

    var thebox = $(document).find(".box_situation");

    thebox.on("click", function (e) {
        macro_indicators("remove");
        // $(this).addClass("box_large");   

        var id = $(this).attr("id");
        var theid;

        var region = [];
        region['9'] = [123.36721440101034, 7.857902710030698];
        region['10'] = [124.65464063608344, 8.475770831197266];
        region['11'] = [125.60631753815782, 7.07027327792677];
        region['12'] = [125.18584653752278, 6.1530674954597755];
        region['13'] = [125.54614271415122, 8.950620097858073];
        region['barmm'] = [124.23429509668361, 7.194501972735879];

        switch (id) {
            case "region_9_box": region_id_selected = theid = "9"; break;
            case "region_10_box": region_id_selected = theid = "10"; break;
            case "region_11_box": region_id_selected = theid = "11"; break;
            case "region_12_box": region_id_selected = theid = "12"; break;
            case "region_13_box": region_id_selected = theid = "13"; break;
            case "region_barmm_box": region_id_selected = theid = "barmm"; break;
        }

        map.setPaintProperty("region" + theid, "fill-color", "#333");

        // map.setPaintProperty("regionbarmm","fill-color","#ffd966");
        // map.flyTo({zoom:9, center: region[theid]});

        //get_("get_agenda_details",{ agendaid : theid }, function(data) {
        make_loading(id, 53, "Agenda 1");
        make_loading(id, 76, "Agenda 2");
        make_loading(id, 27, "Agenda 3");
        make_loading(id, 97, "Agenda 4");
        make_loading(id, 24, "Agenda 5");
        make_loading(id, 75, "Agenda 6");
        make_loading(id, 12, "Agenda 7");
        make_loading(id, 74, "Agenda 8");
        make_loading(id, 35, "Agenda 9");
        //  });
    });

}