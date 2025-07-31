var selectedloc = [];

function map_pin(logo, somefunc = false, id = false, devpart = false, status = false, lat = false, lng = false) {
    const el = document.createElement('div');
    const width = 100;
    const height = 100;

    var thelogo = asset + "images/icons/" + logo;

    el.className = 'marker ' + "marker_" + status + " marker_id_" + id;
    el.style.backgroundImage = "url(" + thelogo + ")";
    // el.style.width              = '40px';
    // el.style.height             = '40px';
    el.style.width = '25px';
    el.style.height = '25px';
    el.style.backgroundSize = '80%';
    el.style.backgroundRepeat = "no-repeat";
    el.style.backgroundPosition = "center center";
    el.style.backgroundColor = "#fff";

    if (somefunc != false) {
        el.addEventListener('click', (e) => {
            $(document).find(".marker").siblings().removeClass("marker_selected");
            el.classList.add("themarker_selected");

            map.flyTo({
                // zoom: 7.5,
                // center: [lng-1, lat-1],
                center: [lng, lat],
                essential: true
            });

            somefunc(id, devpart, lat, lng, logo, status);
        });
    }

    return el;
    // Add markers to the map.
    // new mapboxgl.Marker(el)
    //     .setLngLat([125.66675715500003,7.841694446000075])
    //     .addTo(map);
    // ------------
}

function create_box(logo, somefunc = false, id = false, devpart = false, css_class = false, lat = false, lng = false) {
    const el = document.createElement('div');
    const width = 500;
    const height = 500;

    // var thelogo  = asset+"images/icons/"+logo;

    el.className = 'boxdiv ' + css_class;
    // el.style.backgroundImage    = "url("+thelogo+")";
    el.style.width = '200px';
    el.style.height = '100px';
    el.style.backgroundSize = '80%';
    el.style.backgroundRepeat = "no-repeat";
    el.style.backgroundPosition = "center center";
    el.id = css_class;
    // el.style.backgroundColor    = "#000";

    if (somefunc != false) {
        el.addEventListener('click', () => {

            map.flyTo({
                zoom: 7.5,
                center: [lng - 1, lat - 1],
                essential: true
            });

            somefunc(id, devpart);
        });
    }

    return el;
}

function circle_situation(width = false, height = false, css_class) {
    const el = document.createElement('div');

    el.className = 'circle_situation ' + css_class;
    el.style.width = width;
    el.style.height = height;
    el.style.backgroundSize = '80%';
    el.style.backgroundRepeat = "no-repeat";
    el.style.backgroundPosition = "center center";
    el.id = css_class;

    return el;
}

function box_situation(width = false, height = false, css_class) {
    const el = document.createElement('div');

    el.className = 'box_situation ' + css_class;
    // el.style.backgroundImage    = "url("+thelogo+")";
    el.style.width = "200px";
    // el.style.height             = "0px";
    el.style.backgroundSize = '80%';
    el.style.backgroundRepeat = "no-repeat";
    el.style.backgroundPosition = "center center";
    el.id = css_class;

    return el;
}

function get_(getwhat, d, somefunc = false) {
    $.ajax({
        url: url + "/" + getwhat,
        type: "get",
        data: d,
        dataType: "json",
        success: function (data, jqXHR) {
            if (somefunc != false) {
                somefunc(data, jqXHR);
            }
        }
    });
}

function addblacker(somefunc = false, color = "black_it") {
    removeblacker(); //  <i class='bi bi-x-square closeblacker'></i>
    $("<div class='blacker_ " + color + "' id='theblacker'> </div>").appendTo("body");

    $(document).on("click", ".closeblacker, #theblacker", function () {
        removeblacker(somefunc);

        var detailsbox = $(document).find(".details_box");

        $(document).find(".marker").removeClass("marker_active");

        detailsbox.animate({
            "left": "0",
            "width": "0" + "%"
        }, 300);
    });
}

function removeblacker(somefunction = false) {
    $(document).find(".blacker_").remove();

    if (somefunction != false) {
        somefunction();
    }
}

function check_panel() {
    var url = window.location.href;

    // return url.split("/")[4] || false;

}

function rbme_panel(action = false) {
    if (action == "remove") {
        $(document).find(".rbme_side").hide("fast");
    } else if (action == false) {
        $(document).find(".rbme_side").show("fast");
    }
}

function ma_panel(action = false) {
    if (action == "remove") {
        $(document).find(".the_mindanao_agenda").hide("fast");
    } else if (action == false) {
        $(document).find(".the_mindanao_agenda").show("fast");
    }
}

function legend_div(action = "add") {
    if (action == "add") {
        $(document).find("#legend_div").show("fast");
    } else if (action == "remove") {
        $(document).find("#legend_div").hide("fast");
    }
}


function the_status(percent) {
    var status = [];
    status['label'] = null;
    status['loading'] = null;
    status['color'] = null;

    if (percent >= 76) {
        status['label'] = "Mindanao Agenda Achieved";
        status['loading'] = "green_loading";
        status['color'] = "#007f00";
    } else if (percent >= 51 && percent <= 75) {
        status['label'] = "Challenges Remain";
        status['loading'] = "yellow_loading";
        status['color'] = "#ffd966";
    } else if (percent >= 26 && percent <= 50) {
        status['label'] = "Significant Challenges Remain";
        status['loading'] = "pink_loading";
        status['color'] = "#f4b084";
    } else if (percent <= 25) {
        status['label'] = "Major Challenges Remain";
        status['loading'] = "red_loading";
        status['color'] = "#ff0000";
    } else {
        status['label'] = "Information unavailable";
        status['loading'] = "grey_loading";
        status['color'] = "#cccccc";
    }

    return status;
}

function display_pin(data) {
    var preparing = null;
// console.log(data);
   // map.on("load", function () {
        // $(document).find(".left_box").show("fast");

        for (var o = 0; o <= data[0].length - 1; o++) {
          
            // var thelogo_pin = data[0][o].pin+"_"+data[0][o].status+".png";

            // if (preparing == null) {
            //     preparing = data[0][o].masterid;
            // } else {
            //     if (preparing == data[0][o].masterid) {
            //         continue;
            //     }
            //     preparing = data[0][o].masterid;
            // }

            var status      = data[0][o].status;
            var thelogo_pin = data[0][o].logo + ".png";
            var id          = data[0][o].masterid;
            var devpart     = data[0][o].abbr;

            devpart = devpart.replace(/\s/g, "");
    
            if (data[0][o].typeofobj == "point") {
                
                var pin = map_pin(thelogo_pin, function (id, devpart, lat, lng, thelogo_pin, status) {
                    // logo, somefunc = false, id = false, devpart = false, status = false, lat = false, lng = false
                    selectedloc = [lng, lat];

                    var detailsbox = $(document).find(".details_box");

                    $(document).find("#" + devpart).siblings().removeClass("li_selected");
                    $(document).find("#" + devpart).addClass("li_selected");

                    get_("getdetails", { ii : id }, function (dd) {
                        display_details_mpap(dd, id, devpart, status, thelogo_pin);
                    });

                    // addblacker(function(){
                    //     $(document).find(".search_result").hide("fast");
                    // }, "black_it");

                    detailsbox.animate({
                        "width": "35" + "%",
                        "padding-left": "20px",
                        "padding-right": "20px",
                        "padding-top": "20px"
                    }, 300);

                }, id, devpart, status, data[0][o].lat, data[0][o].lng);

                const m = new mapboxgl.Marker(pin).setLngLat([data[0][o].lng, data[0][o].lat]).addTo(map);
 
                marker.push(m);

            } else if (data[0][o].typeofobj == "line") {
   
                var lat = parseCoordinates(data[0][o].lat);

                var pin = map_pin(thelogo_pin, function (id, devpart, status_, lat, lng, thelogo_pin, status) {
                    var detailsbox = $(document).find(".details_box");

                    $(document).find("#" + devpart).siblings().removeClass("li_selected");
                    $(document).find("#" + devpart).addClass("li_selected");
                 
                    get_("getdetails", { ii: id }, function (dd) {
                        display_details_mpap(dd, id, devpart, status, thelogo_pin, status);
                    });

                    detailsbox.animate({
                        "width": "35" + "%",
                        "padding-left": "20px",
                        "padding-right": "20px",
                        "padding-top": "20px"
                    }, 300);

                }, id, devpart, status, lat[0][1], lat[0][0]);

                // create_line(lat, "line" + o, returnColor(data[0][o].status), 4);

                const m = new mapboxgl.Marker(pin).setLngLat([lat[0][0], lat[0][1]]).addTo(map);

                marker.push(m);
            }
        }
  
    //});// map
}

function returnColor(status) {
    colors['on-going'] = "#b6d7a8";
    colors['pipeline'] = "#f69a1b";
    colors['completed'] = "#6aa84f";
    colors['on-hold'] = "#fadc64";

    return colors[status];
}

function parseCoordinates(coordString) {
    return coordString
        .match(/\[.*?\]/g) // Find all [x,y] patterns
        .map(pair => JSON.parse(pair)); // Convert each to array
}

function display_details_mpap(data, id, devpart, status, thelogo_pin) {

    $(document).find("#projecttitle").text(data[0][0].title);
    $(document).find("#thedescs").text(data[0][0].description);
    $(document).find("#projectstatus").text(data[0][0].status);
    $(document).find("#projectprice").text(formatNumber(data[0][0].projectamount));
    $(document).find("#thesector").text(data[0][0].thesector);
    $(document).find("#tof").text(data[0][0].type_of_financing);

    $(document).find("#proj_locs").children().remove();

    for (var i = 0; i <= data[1].length - 1; i++) {
        $("<li class='markerhover' data-markhov='marker_id_" + data[1][i].geolocationid + "'> <div><i class='bi bi-geo-alt font-30'></i></div> <div> <h4 class='mb-0'>" + data[1][i].columnplace + "</h4> <span> " + formatNumber(data[1][i].projectamountpersite) + " </span></div> </li>")
            .appendTo("#proj_locs");
    }

    $(document).on('click', "#display_in_map", function () {
        removemarker();

        for (var i = 0; i <= data[1].length - 1; i++) {
            var iid = data[1][i].geolocationid;

            var pin = map_pin(thelogo_pin, function (id, devpart, status, lat, lng) {

            }, iid, devpart, status, data[0][i].lat, data[0][i].lng);

            const m = new mapboxgl.Marker(pin).setLngLat([data[1][i].lng, data[1][i].lat]).addTo(map);

            marker.push(m);

            var theline_line = [selectedloc, [data[1][i].lng, data[1][i].lat]];

            // create_line(theline_line, "connectionline_" + i + iid, "#f80000", 2);
        }

        // create_line(theline, "connectionline", "#f80000", 2);
    });
}

function animateCount(id, target, duration) {
    $({ countNum: 0 }).animate(
        { countNum: target },
        {
            duration: duration,
            easing: 'swing',
            step: function () {
                $(id).text(Math.floor(this.countNum));
            },
            complete: function () {
                $(id).text(formatNumber(this.countNum)); // Ensure final number is accurate
            }
        }
    );
}

function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}