<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Mindanao Development Tracker </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.js"></script>
    <script>
        var url = "{{url('tracker/')}}";
        var asset = "{{asset('tracker/')}}";
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{url('tracker/style/generalstyle.css')}}" />
    <link rel="stylesheet" href="{{url('tracker/style/mpapstyle.css')}}" />

    <div id="top_navigation_ma_rbme">
        <ul>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-briefcase"></i> &nbsp; TRADE </li>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-bank"></i> &nbsp; INVESTMENT </li>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-airplane"></i> &nbsp; AIRPORTS </li>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-water"></i> &nbsp; SEA PORTS </li>
            <!-- <li class='btn btn-light' data-bs-toggle="modal" data-bs-target="#filterdiv"> <i class="bi bi-filter"></i> Open Filter </li> -->
        </ul>
    </div>

    <div id="bottom_navigation_ma_rbme">
        <div class="row">
            <div class="col-md-12 text-end">
                <button class='btn btn-light' data-bs-toggle="modal" data-bs-target="#filterdiv"> <i class="bi bi-filter"></i> Open Filter </button>
            </div>
            <div class="col-md-12 mt-5">
                <div class="row search_box">
                    <div class="col-md-11">
                        <input type='text' id="searchbtnbig" placeholder="Search Project..." />
                    </div>
                    <div class="col-md-1 mid_box"> <i class="bi bi-search"></i> </div>
                </div>
            </div>
            <!-- <div class="col-md-2">
                <button class='btn btn-light' data-bs-toggle="modal" data-bs-target="#filterdiv"> <i class="bi bi-filter"></i> Open Filter </button>
            </div> -->
        </div>
    </div>

    <!-- <div id="legend_div">
    <div class="row">
        <div class="col-md-3 lbl_hover">
            <span class="legendspan pipeline" data-legend = "pipeline"> </span> <p class='lbl'> Pipeline </p>
        </div>
        <div class="col-md-3 lbl_hover">
            <span class="legendspan onhold" data-legend = "on-hold"> </span> <p class='lbl'> On-hold </p>
        </div>
        <div class="col-md-3 lbl_hover">
            <span class="legendspan ongoing" data-legend = "on-going"> </span> <p class='lbl'> On-Going </p>
        </div>
        <div class="col-md-3 lbl_hover">
            <span class="legendspan completed" data-legend = "completed"> </span> <p class='lbl'> Completed </p>
        </div>
    </div>
</div> -->
    <div class="details_box addgradient">
        <div class="first_box mb-5">
            <div class="imagebox">
                <!-- <img src="https://static.vecteezy.com/system/resources/thumbnails/036/324/708/small/ai-generated-picture-of-a-tiger-walking-in-the-forest-photo.jpg"/> -->
            </div>
            <span> Project Title </span>
            <h5 style="line-height: 32px;" id="projecttitle"> &nbsp; </h5> <i class="bi bi-backspace-fill theclosebtn" title='Close this window'></i>
        </div>
        <div class="second_box">
            <!-- <ul class='thenavigation'>
            <li> DETAILS </li>
            <li> PROJECTS </li>
        </ul> -->
            <div class="tab_content">
                <div id="details_div" class="mb-5">
                    <span> Project Description </span>
                    <p class="description" id="thedescs"> &nbsp; </p>
                </div>
                <div id="projects_div">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <div>
                                <span> Status </span>
                                <h5 id="projectstatus"> -- </h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <span> Project Cost </span>
                                <h5> $ <strong id="projectprice"> -- </strong> </h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <span> Type of Financing </span>
                                <h5 id='tof'> -- </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div>
                                <span> Sector </span>
                                <h5 id="thesector"> -- </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div>
                                <span> Development Partner </span>
                                <h5 id="devpartner"> -- </h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div>
                                <div style="display:flex;">
                                    <span> Project Locations </span>
                                    <button id="display_in_map" class="btn btn-primary btn-sm" style="margin-top: -8px;margin-left: 15px;"> Display in Map </button>
                                </div>
                                <ul class='proj_locs mt-2' id="proj_locs">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="search_result p-10">
        <h5> Search Results </h5> <span>
            <span id="thesearchresults"></span>
    </div>


    <div class="row left_box px-5 py-5">
        <div class="logodiv col-md-12 pb-10 d-flex">
            <img src="{{asset('tracker/images/mdt_logo.png')}}" style="width:150px;"/>
            <div style="align-content: center;width: 100%;text-align: center;">
                <!-- <h3 style="text-shadow: 0px 1px 2px #929292;"> Mindanao Development Tracker </h3> -->
            </div>
        </div>
        <div class="bodydiv col-md-12 mb-2">

            <!-- <div class="d-flex">
                <h5 class="mb-5"> Filter </h5>
                <ul class='ul_filter'>
                    <li data-bs-toggle="modal" data-bs-target="#filterdiv"> Generate Report </li>
                    <li> <i class="bi bi-cash-coin font-18"></i>  </li> <i class="bi bi-pie-chart-fill font-18"></i>
                    <li> <i class="bi bi-heart-fill font-18"></i>  </li>
                    <li> <i class="bi bi-briefcase font-18"></i>  </li>
                </ul>
            </div> -->
        </div>
        <div class="contentdiv col-md-12">
            <h5 class='mb-5'> General Statistics </h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="row px-10">
                        <div class="col-md-12 boxes_div mb-5">
                            <h6> Amount </h6>
                            <div class="boxes_div d-flex">
                                <p class='font-26 mt-4'>
                                    <strong id='total_total'> </strong>
                                </p>
                                <div class="">
                                    <div class="font-18 d-flex">
                                        <hr class='borderclass_amnt' />
                                        <p class='font-16'>
                                            <span> $ </span>
                                            <span id='odaloan'> </span> Loan
                                        </p>
                                    </div>
                                    <div class="font-18 d-flex">
                                        <hr class='borderclass_amnt' />
                                        <p class='font-16'>
                                            <span> $ </span>
                                            <span id='odagrant'> </span> Grant
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="boxes_div mb-4">
                                <div style='display:flex; justify-content: space-between; margin-bottom:5px;'><span> Total ODA Loan </span> </div>
                                <h3> <span> $ </span>
                                    <span id='odaloan'> </span>
                                </h3>
                                <strong class="showprojects_click" id="loanprojects">
                                </strong>
                                <small> projects in Mindanao </small>
                            </div>
                            <div class='boxes_div'>
                                <div style='display:flex; justify-content: space-between; margin-bottom:5px;'><span> Total ODA Grant </span> </div>
                                <h3>
                                    <span> $ </span>
                                    <span id='odagrant'> </span>
                                </h3>
                                <strong class="showprojects_click" id="grantprojects"> </strong>
                                <small> projects in Mindanao </small>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 boxes_div mb-4" style="height: 250px;">
                    <h6> Loan and Grant Distribution </h6>
                    <span id="theloangrantdiv"> </span>
                    <!-- <div class="thegraphdiv">
                        <ul class="ruby-flex" id="thelines">
                            <li title="2025" style="height:1%; margin:0px 1px; width:15px;" class="thecolor 2025_list"> </li>
                            <li title="2024" style="height:100%; margin:0px 1px; width:15px;" class="thecolor 2024_list"> </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class='boxes_div'>
                        <h6> Distributions </h6>
                        <div class='row'>
                            <!-- <div class="col-md-6">
                                <div id="pie_map" style="height:200px; width:100%;"></div>
                            </div>
                            <div class="col-md-6">
                                <div id="stacked_sector" style="height:333px; width:100%;"></div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display:none;">
                <div class="col-md-12">
                    <div class='boxes_div' style="height: 220px;">
                        <h6> Total oda funds in Mindanao </h6>
                        <h1 class="font-40 d-flex" style="justify-content:space-between;"> <span id="showingyear" style="font-size: 30px;margin-top: 6px;"> 2016 - <?php echo date("Y"); ?> </span>
                            <i class="bi bi-play-circle-fill mt-10" id='getoda_play' style="font-size: 30px;color: green;"></i>
                        </h1>
                        <hr style="margin: 10px 0px;" />
                        <div class='yearholder'>
                            <ul class="d-flex gap-2 mpap_years" id="mpap_years">
                                <?php
                                for ($year = date("Y"); $year >= 2016; $year--) {
                                    echo "<li data-clist='{$year}_list'> {$year} </li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="thegraphdiv">
                            <!-- <span id="thetimeseries"> </span> -->
                            <ul class="ruby-flex" id="thelines" style="display:none;">
                                <?php
                                $thevalue = array_column($gfpy, 'total');

                                $min      = min($thevalue);
                                $max      = max($thevalue);
                                // $sum      = array_sum($thevalue);

                                // (((totalprojects-min) / (max - min))*100)/100
                                //  echo $gfpy[0]['total']; return;
                                $theyears  = [];

                                for ($i = 0; $i <= count($gfpy) - 1; $i++) {
                                    $normalized = ($gfpy[$i]['total'] - $min) / ($max - $min);
                                    $percentage = ($normalized * 50);
                                    $value      = number_format(($percentage / 50), 2) * 100;

                                    if (!array_key_exists($gfpy[$i]['theyear'], $theyears)) {
                                        $theyears[$gfpy[$i]['theyear']] = $value;
                                    } else {
                                        $theyears[$gfpy[$i]['theyear']] += $value;
                                    }
                                }

                                for ($year = date("Y"); $year >= 2016; $year--) {
                                    $theval = 1;

                                    if (array_key_exists($year, $theyears)) {
                                        $theval = $theyears[$year];
                                    }
                                    echo "<li title = '{$year}' style='height:" . $theval . "%; margin:0px 1px; width:15px;' class='thecolor {$year}_list'> </li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="boxes_div" id="distributiongraph">
                        <span> Loan Distribution </span>
                        <div></div>
                    </div>
                    <div class="boxes_div" id="distributiongraph_region">
                        <span> Distribution per Region </span>
                        <span></span>
                    </div>
                </div>
                <div class="col-md-6 boxes_div" style="display:none;">
                    <div class='d-flex gap-5'>
                        <span> ALL PROJECTS </span>
                    </div>
                    <h1 class='font-50 bbm_blue' id="count_allprojects"> -- </h1>
                    <small> in <strong id="numoflocs"> -- </strong> locations in Mindanao</small>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="filterdiv" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Open Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row mb-2">
                        <!-- <div class="col-md-1">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="regioncheck">
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label class="form-check-label" for="regioncheck">
                                Region
                            </label>
                            <select class="form-control select mb-2" id="region_select">
                                <option value='none'> --- Entire Mindanao </option>
                                <option value='9'> Region 9 </option>
                                <option value='10'> Region 10 </option>
                                <option value='11'> Region 11 </option>
                                <option value='12'> Region 12 </option>
                                <option value='13'> Region 13 </option>
                                <option value='barmm'> Barmm </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <!-- <div class="col-md-1">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="devpartcheck">
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label class="form-check-label" for="devpartcheck">
                                Development Partner
                            </label>
                            <select class="form-control select mb-2" id="devpart_select">
                                <option value='none'> --- None </option>
                                <?php
                                foreach ($devparts as $dp) {
                                    echo "<option value='{$dp->id}'> {$dp->devpartner} </option>";
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <!-- <div class="col-md-1">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="sectorcheck">
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label class="form-check-label" for="sectorcheck">
                                Sectors
                            </label>
                            <select class="form-control select mb-2" id="sector_select">
                                <option value='none'> --- None </option>
                                <?php
                                foreach ($sector as $s) {
                                    echo "<option value='{$s->sectorid}'> {$s->thesector} </option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <!-- <div class="col-md-1">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="statuscheck">
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <label class="form-check-label" for="statuscheck">
                                Status
                            </label>
                            <select class="form-control select mb-2" id="status_select">
                                <option value='none'> --- None </option>
                                <option value="pipeline"> Pipeline </option>
                                <option value='completed'> Completed </option>
                                <option value="on-going"> On-going </option>
                                <option value='on-hold'> On-hold </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div> -->
                    <div>
                        <button type="button" class="btn btn-light btn-sm" id="showinlist"> Show in List </button>
                        <button type="button" class="btn btn-light btn-sm" id="displayOnMap"> Display on the Map </button>
                        <button type="button" class="btn btn-primary btn-sm" id="generatereport_btn">Generate Report</button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div id="map"></div>

    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Responsive.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYWx2aW5tZXJ0byIsImEiOiJjazM3MjBobDEwN3ZvM21wemx6aG5tNHlqIn0.ch2yPYUkeOn1ih6nbfAm1A';

        // mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5 :: dark
        // mapbox://styles/alvinmerto/cm9cboss5008701rcdieh4wec :: light
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/alvinmerto/cm9cboss5008701rcdieh4wec',
            // style: 'mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5',
            center: [125.15492481273519, 7.712736869468826],
            zoom: 7
        });
    </script>

    <script>
        var marker = [];
    </script>
    <script src="{{url('tracker/app/polygons.js')}}"> </script>

    <script src="{{url('tracker/app/front_mpap.js')}}"> </script>
    <script src="{{url('tracker/app/mpap_real.js')}}"> </script>


</body>

</html>