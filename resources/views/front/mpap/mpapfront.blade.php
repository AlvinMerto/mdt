<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Mindanao Development Tracker </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.js"></script>
<script>
    var url   = "{{url('tracker')}}";
    var asset = "{{asset('tracker')}}";
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.3/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.3/mapbox-gl-geocoder.css" type="text/css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

		<link href="{{url('tracker/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('tracker/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('tracker/style/logframe.css')}}" rel="stylesheet" type="text/css" />
        
<style>
    /* .open-sans-bold {
        font-family: "Open Sans", sans-serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
        font-variation-settings:
            "wdth" 100;
    }

    .roboto-bold {
    font-family: "Roboto", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
    font-variation-settings:
        "wdth" 100;
    } */

</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="{{url('tracker/style/generalstyle.css')}}"/>
<link rel="stylesheet" href="{{url('tracker/style/mpapstyle.css')}}"/>

<div id="top_navigation_ma_rbme">
    <ul>
        <li id="show_ma"> <a href="{{url('rbme')}}"> Mindanao Agenda </a> </li>
        <li id="show_mpap"> <a href="{{url('mpap')}}"> Mindanao Programs and Projects </a> </li>
    </ul>
</div>

<div id="map"></div>

<div class="the_mindanao_agenda">
    <ul class="ma_icons"> 
        <?php foreach($ma as $m) { 
            $link     = "tracker/storage/images/ma_icons/{$m->thelogo}";
            $ma_icons = asset($link);
        ?>
        <li class='iconagenda' data-maid="<?php echo $m->agendaid; ?>"> <img src=<?php echo $ma_icons; ?> id="iconagenda_<?php echo $m->agendaid; ?>"> </li>
        <?php } ?>
    </ul>
</div>

<div class="macro_indicators pt-10" id="macro_indicators">
    <div class="d-flex flex-column" style="height: 100%;">  
        <h2 class='pl-25 macrotitle mt-15' style="flex:0;"> MACRO <span class="color-blue"> ECONOMIC INDICATORS </span> </h2>
        <div class="the_indicators mt-20" style="flex:1; overflow:auto; padding-right: 25px; padding-top: 10px;">
            <?php if (count($macro) > 0) { ?>
                <?php foreach($macro as $m) { 
                    $up   = "ki-outline ki-arrow-up fs-5 green-it text-success";
                    $down = "ki-outline ki-arrow-down fs-5 red-it text-danger";

                    $lbl  = null;
                    $txt  = null;
                    $ic   = null;

                    if ($m->trend == "down") {
                        $lbl = $down;
                        $txt = "red-it";
                        $ic  = "<i class='bi bi-graph-down-arrow font-30 {$txt}'></i>";
                    } else {
                        $lbl = $up;
                        $txt = "green-it";
                        $ic  = "<i class='bi bi-graph-up-arrow font-30 {$txt}'></i>";
                    }

                    ?>
                    <div class="row permacro p-15 pl-25">
                        <div class="col-md-3 center_it">
                            <?php echo $ic; ?>
                        </div>
                        <div class="col-md-9">
                            <h3> <span> <?php echo $m->theindicator; ?> </span> 
                                <!-- <i class="<?php // echo $lbl; ?> ms-n1 float-right font-21"></i> </h3> -->
                            <h1 class='font-23 <?php echo $txt; ?>'> <?php echo $m->ma_value; ?> </h1> 
                            <span> <?php echo $m->smalltext; ?> </span>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<div id="agenda_info_show" class="theagendadiv">
    <div class="rbme_wrap">
        <div class="firstbox">
            <div class="row">
                <div class="col-md-12">
                    <h6 id='agendanum'> &nbsp; </h6>
                </div>
                <div class="col-md-8">
                    <h1 id="theagenda"> &nbsp;
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                        </span> 
                    </h1>
                </div>
                <div class="col-md-4 header_div_stat">
                    <img class="each_agenda_icon" id="agendalogo" src=""/>
                </div>
                <div class="col-md-12">
                    <p class="font-16" id="agendatagline"> &nbsp; </p>
                </div>
            </div>
        </div>
        <div class="secondbox">
            <div class="row">
                <div class="col-md-12">
                    <h3> GOAL </h3>
                    <p class="font-16" id="agendagoal"> &nbsp; </p>
                </div>
                <div class="col-md-12">
                    <ul class='font-15 thechallenges' id="thechallenges">

                    </ul>
                </div>
            </div>
        </div>
        <div class="thirdbox">
            <div class="row">
                <div class="col-md-12">
                    <h3> OUTCOMES 
                    <div style='float:right;'>
                        <button id='showprojects' class='btntool'> Show Projects </button> 
                        <button id='showlayer' class='btntool'> Layer </button> 
                    </div>
                    </h3>
                </div>
                <div id="theoutcomes"> </div>
            </div>
        </div>
    </div>
    <div class="otherinfo_wrap">

    </div>
</div>

<div class="details_box">
    <div class="first_box">
        <div class="imagebox">
            <!-- <img src="https://static.vecteezy.com/system/resources/thumbnails/036/324/708/small/ai-generated-picture-of-a-tiger-walking-in-the-forest-photo.jpg"/> -->
        </div>
        <h5 style="line-height: 32px;" id="projecttitle"> &nbsp;  </h5>
    </div>
    <div class="second_box">
        <!-- <ul class='thenavigation'>
            <li> DETAILS </li>
            <li> PROJECTS </li>
        </ul> -->
        <div class="tab_content">
            <div id="details_div">
                <p class="description" id="thedescs"> &nbsp;  </p>
            </div>
            <div id="projects_div">

            </div>
        </div>
    </div>
</div>

<div class="right_box">
   <div id="chartdiv"></div>
</div>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYWx2aW5tZXJ0byIsImEiOiJjazM3MjBobDEwN3ZvM21wemx6aG5tNHlqIn0.ch2yPYUkeOn1ih6nbfAm1A';
    
    // mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5 :: dark
    // mapbox://styles/alvinmerto/cm9cboss5008701rcdieh4wec :: light
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/alvinmerto/cm9cboss5008701rcdieh4wec',
        // style: 'mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5',
        center: [124.01457370296849, 7.393817438271621],
        zoom: 7.5
    });
</script>

<script src="{{url('tracker/app/polygons.js')}}"> </script>
<script src="{{url('tracker/app/polygon_map.js')}}"> </script>

<script src="{{url('tracker/app/graphs_mpap.js')}}"> </script>
<script src="{{url('tracker/app/front_mpap.js')}}"> </script>
<script src="{{url('tracker/app/mpap_events.js')}}"> </script>
<script src="{{url('tracker/app/rbme.js')}}"> </script>

</body>
</html>