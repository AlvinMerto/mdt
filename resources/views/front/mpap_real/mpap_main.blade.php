<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Mindanao Programs and Projects - MDT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v3.11.0/mapbox-gl.js"></script>
    <script>
        var url = "{{url('')}}";
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{url('style/generalstyle.css')}}" />
    <link rel="stylesheet" href="{{url('style/mpapstyle.css')}}" />

    <div id="top_navigation_ma_rbme" class="addBorderRadius">
        <div class="row searchMotherDiv">
            <div class="col-md-12 removepadding">
                <div class="row search_box">
                    <div class="col-md-8">
                        <input type='text' id="searchbtnbig" placeholder="Search Project..." />
                    </div>
                    <div class="col-md-1 mid_box"> <i class="bi bi-search"></i> </div>
                    <div class="col-md-3 filterbtn">
                        <button class='btn btn-light w-100 h-100 borderradius' 
                                data-bs-toggle="modal" 
                                data-bs-target="#filterdiv"> 
                                    <i class="bi bi-filter"></i> Filter 
                        </button>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12 text-end mt-2">
                <button class='btn btn-light w-100' data-bs-toggle="modal" data-bs-target="#filterdiv"> <i class="bi bi-filter"></i> Open Filter </button>
            </div> -->
            <!-- <div class="col-md-2">
                <button class='btn btn-light' data-bs-toggle="modal" data-bs-target="#filterdiv"> <i class="bi bi-filter"></i> Open Filter </button>
            </div> -->
        </div>
    </div>
    @include('front.mainnavs',['navigation'=>'mpap'])
    <!-- <div id="bottom_navigation_ma_rbme">
        <ul>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-briefcase"></i> &nbsp; TRADE </li>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-bank"></i> &nbsp; INVESTMENT </li>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-airplane"></i> &nbsp; AIRPORTS </li>
            <li class='btn btn-light' id="show_ma"> <i class="bi bi-water"></i> &nbsp; SEA PORTS </li>
        </ul>
    </div> -->

    <div id="bottom_navigation_ma_rbme">
        <div class="timeline-mpap">
            <?php for($i=2016;$i<=date("Y");$i++) { ?>
                <?php $class = ""; 
                    if ($i == date("Y")) {
                        $class = "selected_timeline";
                    }
                ?>
                <div class="container-mpap <?php echo $class; ?>">
                    <div class="content-mpap">
                    <h6 class='theyear_mpap'><?php echo $i; ?></h6>
                    </div>
                </div>
            <?php } ?>
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

    <!-- <div class="search_result p-10" id="search_result"> -->
    <div class="modal fade" id="search_result">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h6> Search Results </h6>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <span id="thesearchresults"></span>
                </div>
                <!-- <div class="modal-footer">
                    <button class="btn btn-primary btn-xs"> Download </button>  
                </div> -->
            </div>
        </div>
        <!-- <h5> <i class="bi bi-x-lg closethiswindow" data-window='#search_result'></i> Search Results 
                <button class="btn btn-primary btn-xs"> Download </button> 
        </h5>  -->
        
    </div>


    <div class="row left_box px-5 py-5">
        <div class="logodiv col-md-12 pb-10 d-flex" style="display:none !important; ">

            <!-- <img src="{{asset('images/mdt_logo.png')}}" style="width:150px;" />
            <div style="align-content: center;width: 100%;text-align: center;">
            
            </div> -->
        </div>
        <div class="bodydiv col-md-12 mb-2" style="display:none !important; ">

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
        <div class="contentdiv overflow-y-scroll col-md-12 mt-20">
            <h5 class='mb-5'> General Statistics <i class="bi bi-list opengenstat"></i> </h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="boxes_div mb-5">
                        <h6> Amount </h6>
                        <div class="boxes_div d-flex" style="background: #fff;">
                            <p class='font-1-9rem mt-4'>
                                <strong id='total_total' class="grandtotal"> </strong>
                            </p>
                            <div class="">
                                <div class="font-18 d-flex">
                                    <hr class='borderclass_amnt' />
                                    <p class='font-16 loaddist' data-typeoffinancing="Loan">
                                        <span> $ </span>
                                        <span id='odaloan'> </span> Loan
                                    </p>
                                </div>
                                <div class="font-18 d-flex">
                                    <hr class='borderclass_amnt' />
                                    <p class='font-16 loaddist' data-typeoffinancing="Grant">
                                        <span> $ </span>
                                        <span id='odagrant'> </span> Grant
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="boxes_div mb-5" style="height: 318px; display:none;">
                        <h6> Distribution per Financial Assistance </h6>
                        <span id="theloangrantdiv"> </span>
                        <!-- <div class="thegraphdiv">
                                    <ul class="ruby-flex" id="thelines">
                                        <li title="2025" style="height:1%; margin:0px 1px; width:15px;" class="thecolor 2025_list"> </li>
                                        <li title="2024" style="height:100%; margin:0px 1px; width:15px;" class="thecolor 2024_list"> </li>
                                    </ul>
                                </div> -->
                    </div>

                    <div class="boxes_div mb-5">
                        <h6> Number of Projects </h6>
                        <div class="boxes_div d-flex" style="background: #fff;">
                            <p class='font-26 mt-4'>
                                <strong id='totalnumprojs'  class="grandtotal"> <span>--</span> </strong>
                            </p>
                            <div class="">
                                <div class="font-18 d-flex">
                                    <hr class='borderclass_amnt' />
                                    <p class='font-16 numofprojs' data-typeoffinancing="Loan">
                                        <span id='odaloan_projects'> -- </span> Loan
                                    </p>
                                </div>
                                <div class="font-18 d-flex">
                                    <hr class='borderclass_amnt' />
                                    <p class='font-16 numofprojs' data-typeoffinancing="Grant">
                                        <span id='odagrant_projects'> -- </span> Grant
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="boxes_div mb-5">
                        <!-- <h6 class="dist_name"> -- </h6>
                        <div id="distributiongraph"></div> -->
                        <h6 style="border-bottom: 1px solid #ccc;padding-bottom: 10px;margin-bottom: 15px;"> <span class="dist_name_reg"> &nbsp; </span> <i class="bi bi-x-circle closethiswindow" data-window='#dist_per_reg'></i></h6>
                        <div id="distributiongraph_region"></div>
                    </div>

                    <!-- <div class="boxes_div" id="dist_per_reg" style="background:#fff;">
                        <h6 style="border-bottom: 1px solid #ccc;padding-bottom: 10px;margin-bottom: 15px;"> Distribution of <span class="dist_name_reg"> </span> per Region <i class="bi bi-x-circle closethiswindow" data-window='#dist_per_reg'></i></h6>
                        <div id="distributiongraph_region"></div>
                    </div> -->

                    <div class="boxes_div mb-5">
                        <h6> Top ODA funders <small style="float: right;"> All </small> </h6>
                        <div class="boxes_div d-flex" style="background: #fff;">
                            <ul class="theodalist">
                                <!-- <li class="d-flex flex-row"> 
                                    <img src="{{asset('images/mdt_logo.png')}}" style="width:10px;" />
                                    <div>
                                        <h5> Hello World </h5>
                                        <p> This is the world </p>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="row px-10">
                        <div class="col-md-12 boxes_div">
                            <?php
                            function thegraphs($tof, $persector)
                            {
                                $regions       = ["9", "10", "11", "12", "13", "barmm"];

                                $doms          = "";
                                foreach ($regions as $reg) {

                                    $nums    = [];
                                    $min     = null;
                                    $max     = null;

                                    $doms .= "<div class='labelchart'>Region {$reg} </div>";
                                    $filtered = $persector->where("region", $reg)->toArray();

                                    foreach ($filtered as $f) {
                                        array_push($nums, $f->total_amount);
                                    }

                                    if (count($filtered) > 0) {
                                        $min = min($nums);
                                        $max = max($nums);

                                        $thenums = [];

                                        foreach ($filtered as $ffs) {
                                            if ($ffs->type_of_financing == $tof) {
                                                continue;
                                            }

                                            if (strlen($ffs->total_amount) > 0) {
                                                if ($ffs->total_amount > 0) {
                                                    $norm = ($ffs->total_amount - $min) / ($max - $min);
                                                    $perc = ($norm * 100);
                                                    $pts  = ($perc / 100);

                                                    array_push($thenums,  $perc);
                                                }
                                            } else {
                                                array_push($thenums, 0);
                                            }
                                        }
                                    } else {
                                        $thenums = [0, 0, 0, 0];
                                    }

                                    $doms .=  "<div class='barchart' style=" ?> <?php $countt = 1;
                                                                                foreach ($thenums as $tns) {
                                                                                    $doms .=  "--a{$countt}:{$tns};";
                                                                                    $countt++;
                                                                                } ?> <?php $doms .=  ">";
                                                                                                    $count = 1;
                                                                                                    foreach ($thenums as $tn) {
                                                                                                        $doms .=  "<div class='segmentbar a{$count}'></div>";
                                                                                                        $count++;
                                                                                                    }
                                                                                                    $doms .=  "</div>";
                                                                                                }
                                                                                                    ?>

                            <?php return $doms;
                            } ?>

                            <h6> Distribution Per Sector per type of financial assistance</h6>
                            <!-- <span id="pie_map"> </span> -->
                            <ul class="the_nav_chart" id="the_nav_chart">
                                <li class="small_tab_select" data-window="loan_window"> Loan </li>
                                <li data-window='grant_window'> Grant </li>
                            </ul>
                            <div id="loan_window" class="thewindow showthiswindow">
                                <div class="chart">
                                    <?Php echo thegraphs("loan", $persector); ?>
                                </div>
                            </div>
                            <div id="grant_window" class="thewindow">
                                <div class="chart">
                                    <?Php echo thegraphs("grant", $persector); ?>
                                </div>
                            </div>
                            <div style="margin-top: 12px; padding-top:12px; border-top:4px dotted #ccc;">
                                <h5> Legend </h5>
                                <?php
                                $unique_sector = $persector->unique('thesector')->toArray();
                                $sectors       = [];

                                foreach ($unique_sector as $us) {
                                    $sectors[] = $us->thesector;
                                }

                                $counttt = 1;
                                foreach ($sectors as $key => $s) {
                                    echo "<div class='d-flex flex-row gap-3' style='font-size: 12px !important; margin-bottom: 5px; border-bottom: 1px solid #ccc;'> 
                                            <table>
                                                <tr> 
                                                    <td style='vertical-align: top; padding-top:4px;'> <div style='margin-bottom:0px;height: 14px;width: 30px;' class='a{$counttt}'> </div> </td>
                                                    <td style='vertical-align: top; padding-left:10px;'> <p style='margin-bottom:0px;'> {$s} </p> </td>
                                                </tr>
                                            </table>
                                          </div>";
                                    $counttt++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4 mt-10 " style="display:none;">
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

    <div class="modal fade" id="welcomediv" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h6>WELCOME </h6>
                </div>

                <!-- Modal Body -->
                <div class="modal-body body_details">
                    <h3 class="modal-title" id="modalLabel"> MINDANAO PROGRAMS AND PROJECTS <i class="bi bi-x-lg closethiswindow" data-bs-dismiss="modal" aria-label="Close"></i></h3> <br/>
                    <p>
                        The Program & Project Database represents the operational heart of the Mindanao Development Tracker, housing comprehensive information on every registered development initiative across the region. 
                    </p>
                    <p>    
                        This sophisticated knowledge repository employs advanced database architecture to manage complex relationships between projects, implementing organizations, funding sources, and beneficiary communities. 
                    </p>
                    <!-- <p>
                        Our AI-powered search engine goes beyond simple keyword matching to understand the intent behind user queries, delivering relevant results even when search terminology doesn't exactly match database fields. 
                    </p> -->
                    <p>    
                        Each project profile serves as a digital hub of activity, featuring standardized documentation alongside rich media elements including photos, videos, and testimonials that bring development work to life. 
                    </p>
                    <p>    
                        Interactive timelines visualize project phases, milestones, and key events, while geographic impact mapping shows exact implementation locations down to the barangay level where appropriate. 
                    </p>
                    <p>    
                        Real-time progress indicators track achievements against targets using standardized metrics that enable cross-project comparison. 
                    </p>
                    <p>    
                        The database facilitates discovery of potential synergies between initiatives, highlighting opportunities for collaboration that might otherwise remain hidden. 
                    </p>
                    <p>    
                        Advanced filtering capabilities allow users to generate custom reports based on specific criteria, supporting both high-level analysis and detailed examination of particular development sectors or geographic areas. 
                    </p>
                    <p>    
                        By providing this unprecedented level of transparency and accessibility to project information, the database transforms how stakeholders understand, coordinate, and optimize development efforts across Mindanao.
                    </p>
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
        // , , 
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/alvinmerto/cm9cboss5008701rcdieh4wec',
            // style: 'mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5',
            center: [124.66562344400793, 7.805771432735474],
            zoom: 6.5
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('welcomediv'));
            myModal.show();
        });
    </script>

    <script>
        var marker = [];
    </script>
    <script src="{{url('app/polygons.js')}}"> </script>

    <script src="{{url('app/front_mpap.js')}}"> </script>
    <script src="{{url('app/mpap_real.js')}}"> </script>


</body>

</html>