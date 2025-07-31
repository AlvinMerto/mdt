<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Mindanao Development Tracker </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.js"></script>
<script>
    var url   = "{{url('')}}";
    var asset = "{{asset('')}}";
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

		<link href="{{url('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{url('style/logframe.css')}}" rel="stylesheet" type="text/css" />
        
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

<link rel="stylesheet" href="{{url('style/generalstyle.css')}}"/>
<link rel="stylesheet" href="{{url('style/mpapstyle.css')}}"/>

<div id="top_navigation_ma_rbme">
    <ul>
        <li id="show_ma"> <a href="{{url('mpap/rbme')}}"> Mindanao Agenda </a> </li>
        <li id="show_mpap"> <a href="{{url('mpap')}}"> Mindanao Programs and Projects </a> </li>
    </ul>
</div>

<div id="map"></div>

<div class="left_box" style="display:none;">
        <div class="logodiv">
            <img src="{{asset('images/mdt_logo.png')}}"/>
            <h4 style="margin: 35px 0px 25px 0px; font-size: 14px;"> List of Development Partners  </h4>
        </div>
        <div class="bodydiv">
            <div class="search_box row">
                <div class="col-md-10">
                    <input type='text' placeholder="Search..."/>
                </div>
                <div class="col-md-2"> <i class="bi bi-search"></i> </div>
            </div>
            <div class="btn-divs">
                <p> &nbsp; </p>
                <div>
                    <button id="ma_button"> Mindanao Agenda </button>
                    <button id="analysisbtn"> Analysis </button>
                    <!-- <button> Filter </button> -->
                </div>
            </div>
        </div>
        <div class="contentdiv">
            <!-- <p class="listtitle"> List of Development Partners <i class="bi bi-arrow-clockwise refresh_page"></i> </p> -->
            <ul class="ullist">
                <?php
                    if (count($devpart) > 0) {
                        foreach($devpart as $d) { 
                            $icon = asset("images/icons/".$d['logo']).".png";
                            ?>
                            <li id="<?php echo str_replace(' ', '', $d['abbr']); ?>">
                                <div class="row">
                                    <div class="col-md-3 devbox">
                                        <img src="{{$icon}}"/>
                                    </div>
                                    <div class="col-md-9 ptop">
                                        <p class="program_title getprograms" data-devid="<?php echo $d['id']; ?>"> <?php echo $d['devpartner']; ?> </p>
                                        <p class="program_details"> 134 Projects </p>
                                    </div>
                                    
                                    <!-- <div class="col-md-2 icon_div">
                                        <i class="bi bi-arrow-right-short"></i>
                                    </div> -->
                                </div>
                                <div class="li_content">
                                    <div class="row">
                                        <div class="col-md-12 p-l">
                                            <p class="small_title"> List of Programs/Projects</p>
                                            <span id="theprograms_<?php echo $d['id']; ?>"></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                <?php   }
                    }
                ?>
            </ul>
        </div>
</div>

<div class="rbme_side">
    <div class="rbme_left">
        <!-- <div class="logodiv mt-30">
            <img src="{{asset('images/rbme_logo.png')}}"/>
        </div> -->
        <div class="bodydiv mt-30 white-font pl-25 pr-25">
            <div class="row bor-b pb-2">
                <div class="col-md-12">
                    <h4 class='font-14 npp black_text'> PROGRAMS AND PROJECTS </h4>
                </div>
                <!-- <div class="col-md-5" style="text-align: right;">
                    <span class="button_small"> Show Projects </span>
                </div> -->
            </div>
            <div class="row mt-10">
                <div class="col-md-4 p-0">
                    <select class="mpap-select-big black_text black_text form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto font-35" id="yearselect">
                        <?php 
                            for($i = date("Y") ; $i >= 2016; $i--) {
                                echo "<option value='{$i}'> {$i} </option>";
                            } 
                        ?>
                    </select>
                </div>
                <div class="col-md-8 p-0">
                    <select class="mpap-select-big black_text form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto font-35">
                        <option value='all'> Mindanao </option>
                        <option value='9'> Region IX </option>
                        <option value='10'> Region X </option>
                        <option value='11'> Region XI </option>
                        <option value='12'> Region XII </option>
                        <option value='13'> Region XIII </option>
                        <option value='barmm'> Barmm </option>
                    </select>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-md-12 p-0">
                    <h3 class="font-80 red-it bold-it m-0"> <span id="numofprojs"> <?php echo $numofprojs; ?> </span> <i class="bi bi-play-circle-fill font-60" id="playit"></i> </h3>
                    <p class="red-it font-21"> ODA FUNDED PROGRAMS AND PROJECTS </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="chartdiv_bar"></div>
                </div>
            </div>
        </div>
        <!-- <div class="contentdiv white-font">
            <div class="row ">
                <div class="col-md-12 bor-b">
                    <h4 class='font-14 npp pb-10'> MINDANAO AGENDA AT A GLANCE </h4>
                </div>
                <div class="col-md-12">
                    <div id="agenda_chart"></div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<div class="the_mindanao_agenda">
    <ul class="ma_icons"> 
        <?php foreach($ma as $m) { 
            $link     = "storage/images/ma_icons/{$m->thelogo}";
            $ma_icons = asset($link);
        ?>
        <li class='iconagenda' data-maid="<?php echo $m->agendaid; ?>"> <img src=<?php echo $ma_icons; ?> id="iconagenda_<?php echo $m->agendaid; ?>"> </li>
        <?php } ?>
    </ul>
</div>

<div class="macro_indicators pt-10" id="macro_indicators">
    <div class="d-flex flex-column" style="height: 100%;">  
        <h2 class='pl-25 macrotitle mt-15' style="flex:0;"> MACRO <span class="color-blue"> ECONOMIC INDICATORS </span> </h2>
        <div class="the_indicators mt-20" style="flex:1; overflow:scroll; padding-right: 25px; padding-top: 10px;">
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
                    <!-- <i class="ki-outline ki-arrow-up fs-3 text-success me-2 font-88"> {{asset('images/ma_icons/minda_agenda_1.png')}} </i> -->
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

<script src="{{url('app/polygons.js')}}"> </script>
<script src="{{url('app/polygon_map.js')}}"> </script>

<script src="{{url('app/graphs_mpap.js')}}"> </script>
<script src="{{url('app/front_mpap.js')}}"> </script>
<script src="{{url('app/mpap_events.js')}}"> </script>
<script src="{{url('app/rbme.js')}}"> </script>

</body>
</html>