/* this document is written made for the RBME system and not for MPAP system*/

var marker             = [];
var projects           = [];

var devpart;
var the_regions        = ["9","10","11","12","13","barmm"];
var region_id_selected = null;

var region             = [];
    region['9']        = [123.36721440101034, 7.857902710030698];
    region['10']       = [124.65464063608344, 8.475770831197266];
    region['11']       = [125.60631753815782, 7.07027327792677];
    region['12']       = [125.18584653752278, 6.1530674954597755];
    region['13']       = [125.54614271415122, 8.950620097858073];
    region['barmm']    = [124.23429509668361, 7.194501972735879];

$(document).ready(function() {
    // var panel = check_panel();
    var panel = "rbme";

    if (panel == false) {
        // get_("default",{status:"on-going", devpart:devpart}, function(data) {
        //     removemarker();
        //     display_pin(data);

        //     $(document).find("#show_mpap").addClass("top_nav_selected");
        // });
     } else if (panel == "rbme") {
        $(document).find("#show_ma").addClass("top_nav_selected");
        macro_indicators("show"); 
       
         // call the charts
        // bar_chart();
        // agenda_chart();

        // rbme_panel();
        ma_panel();
        legend_div("remove");

        // load map polygon
        map.on('load', () => {
            barmm_map(false, "#333");
            region9_map(false, "#333");
            region10_map(false, "#333");
            region11_map(false, "#333");
            region12_map(false, "#333");
            region13_map(false, "#333");

            // mindanao agenda completion graph
            ma_status();

        });

        map.setStyle("mapbox://styles/alvinmerto/cmbbn1sw5001901ptg3sk6gb7", {
            // "config": {
            //     "basemap": {
            //         "lightPreset": "night"
            //     }
            // },
        });
        
        map.flyTo({zoom:7, center: [ 122.5358935236059, 7.626732092541126 ]});
        // map.scrollZoom.disable();
    }

});

var playing__;

$(document).on("click","#playit", function() {
    if (playing__) {
        clearInterval(playing__);
        $(this).removeClass("bi-pause-fill").addClass("bi-play-circle-fill");
        
    }
        $(this).removeClass("bi-play-circle-fill").addClass("bi-pause-fill");

        var count = 0;
        var years = ["2016", "2017","2018","2019","2020", "2021","2022","2023","2024","2025"];
        
        var cir_sit = $(document).find(".circle_situation").css({"border-color":"red"});
            cir_sit.css({"width":"0px", "height":"0px"});

        playing__ = setInterval(function () {

            $(document).find("#yearselect").val(years[count]);

            get_("get_projects",{ year : years[count] }, function(data) {
                for(var i = 0; i <= data.length-1; i++) {
                    $(document).find("#numofprojs").html(data[i].numprojs);

                    var reg = $(document).find("#region_"+data[i].region);

                        reg.css({"width" : (40*data[i].numprojs) , "height" : (40*data[i].numprojs)});
                }
            });
            count++;

            if (count == years.length) {
                count = 0;
            }

        }, 2000);

    
});

$(document).on("click",".legendspan", function() {

    get_("default",{status:$(this).data("legend"), devpart : devpart }, function(data) {
        removemarker();
        display_pin(data);
    });
});

$(document).on("click",".marker", function(){
    $(this).siblings().removeClass("marker_active");
    $(this).addClass("marker_active");

    addblacker();
});

$(document).on("click",".refresh_page", function(){
    get_("default",{status:"on-going", devpart:null}, function(data) {
        removemarker();
        display_pin(data);
    });
});

$(document).on("click","#analysisbtn", function() {
    $(document).find(".left_box").hide("fast");
    $(document).find(".right_box").show("fast", function(){
        progress_status_pie();
    });
    
    // 126.5484421162388 , 7.733024850130156 
    // 126.32307052081912, 7.901291689726178

    map.flyTo({
        zoom: 7.5,
        center: [126.5484421162388 , 7.733024850130156 ],
        essential: true
    });

    addblacker(function() {
        $(document).find(".left_box").show("fast");
        $(document).find(".right_box").hide("fast");
  
        map.flyTo({
            zoom: 7.5,
            center: [124.01457370296849, 7.393817438271621],
            essential: true
        });
    }, "white_it");
});

$(document).on("click","#ma_button", function() {
    removemarker();

    $(document).find(".left_box").hide("slow");
    $(document).find(".details_box").hide("slow");
    $(document).find("#legend_div").hide("slow");

    map.setStyle("mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5", {
        "config": {
            "basemap": {
                "lightPreset": "night"
            }
        }
    });
});

$(document).on("click",".getprograms",function(){
    // $('.contentdiv').scrollTo(this);

    $(this).parent().parent().siblings(".li_content").toggle();
    $(this).parent().parent().parent().addClass("li_selected")
    $(this).parent().parent().parent().siblings().removeClass("li_selected");
    var id = devpart = $(this).data("devid");

    $(document).find("#thelist_"+id).children().remove();

    get_("programs", {id:id}, function(data) {
        removemarker();

        $("<ul id='thelist_"+id+"' class='theprograms_ul'>").appendTo("#theprograms_"+id);

        for(var i=0; i<=data[1].length-1;i++) {
            $("<li data-mid='"+data[1][i].masterid+"'> <div class='row'><div class='col-md-1'><i class='bi bi-caret-right-fill'></i></div><div class='col-md-10'>"+data[1][i].title+"</li></div></div>").appendTo("#thelist_"+id);
        }

        display_pin(data);
    });
});

$(document).on("click","#top_navigation_ma_rbme ul li", function() {
    var id = $(this).attr("id");

    $(this).siblings().removeClass("top_nav_selected");
    $(this).addClass("top_nav_selected");

    switch(id) {
        case "show_ma":
            ma_panel();
            rbme_panel("remove");
            break;
        case "show_mpap":
            ma_panel("remove");
            rbme_panel();
            break;
    }
    
});

$(document).on("click",".theprograms_ul li", function(){
    var mid        = $(this).data('mid');

    get_("default",{status:"on-going", devpart:devpart, id : mid}, function(data) {
        removemarker();
        display_pin(data);
    });

    // var detailsbox = $(document).find(".details_box");
    // var mid        = $(this).data('mid');

    // detailsbox.animate({
    //     "left"  : "350",
    //     "width" : "25"+"%" 
    // },300);
});

function removemarker() {
    if (marker.length > 0) {
        marker.forEach(marker => marker.remove());
        marker = []; // clear the array
    }
}

function details_to_boxsituation() {
    // box_situation
    get_("details_tobox",{}, function(d) {
        $(document).find("#box_situation").children().remove();
        $(document).find("#box_situation").append(d);
    });
}

function get_projects(year, region) {

}

function macro_indicators(action = false) {
    if (action == "remove") {
        $(document).find("#macro_indicators").hide("fast");
    } else if (action == "show"){
        $(document).find("#macro_indicators").show("fast");
    }
}

function get_number_of_projects() {
    var region             = [];
        region['9']        = [123.36721440101034, 7.857902710030698];
        region['10']       = [124.65464063608344, 8.475770831197266];
        region['11']       = [125.61081125867426, 7.0753332592561575];
        region['12']       = [125.18584653752278, 6.1530674954597755];
        region['13']       = [125.54614271415122, 8.950620097858073];
        region['barmm']    = [124.23429509668361, 7.194501972735879];

     get_("numberofprojects", { }, function(data) {
            for(var i = 0; i <= data.length-1; i++) {
                var width  = (40*data[i].numprojs);
                var height = (40*data[i].numprojs);

                var circle = circle_situation(width+"px", height+"px", "region_barmm");
                var circle = circle_situation(width+"px", height+"px", "region_"+data[i].region);

                const m = new mapboxgl.Marker(circle).setLngLat(region[data[i].region]).addTo(map);
            }
                      
                var thecirc = $(document).find(".circle_situation");

                thecirc.on("mouseover", function(e){ 
                    switch(e.target.id) {
                        case "region_barmm"    : map.setPaintProperty("regionbarmm","fill-color","#fdba17"); break;
                        case "region_9"        : map.setPaintProperty("region9","fill-color","#ef3828"); break;
                        case "region_10"       : map.setPaintProperty("region10","fill-color","#b0b737"); break;
                        case "region_11"       : map.setPaintProperty("region11","fill-color","#e28427"); break;
                        case "region_12"       : map.setPaintProperty("region12","fill-color","#eb148e"); break;
                        case "region_13"       : map.setPaintProperty("region13","fill-color","#0da1c5"); break;
                    }
                });

                thecirc.on("mouseout", function(e){
                   // $(document).find(".box_situation").remove();
                    switch(e.target.id) {
                        case "region_barmm"    : map.setPaintProperty("regionbarmm","fill-color","#000"); break;
                        case "region_9"        : map.setPaintProperty("region9","fill-color","#000"); break;
                        case "region_10"       : map.setPaintProperty("region10","fill-color","#000"); break;
                        case "region_11"       : map.setPaintProperty("region11","fill-color","#000"); break;
                        case "region_12"       : map.setPaintProperty("region12","fill-color","#000"); break;
                        case "region_13"       : map.setPaintProperty("region13","fill-color","#000"); break;
                    }
                });

                thecirc.on("click", function(e){
                    $(document).find(".box_situation").remove();
                    $("<div class='box_situation' id='box_situation'> </div>").appendTo($(this));
                    details_to_boxsituation();

                    switch(e.target.id) {
                        case "region_barmm"    : 
                            map.setPaintProperty("regionbarmm","fill-color","#fdba17"); 
                            break;
                        case "region_9"        : map.setPaintProperty("region9","fill-color","#ef3828"); break;
                        case "region_10"       : map.setPaintProperty("region10","fill-color","#b0b737"); break;
                        case "region_11"       : map.setPaintProperty("region11","fill-color","#e28427"); break;
                        case "region_12"       : map.setPaintProperty("region12","fill-color","#eb148e"); break;
                        case "region_13"       : map.setPaintProperty("region13","fill-color","#0da1c5"); break;
                    }

                    thecirc.unbind("mouseout");
                });
        });

}