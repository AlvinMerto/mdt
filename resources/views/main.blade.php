<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindanao Development Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{url('style/mainpage.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="wrapper">
        <div class="row height-100">
            <div class="col-md-12 " style="position:absolute; z-index:0;height: 100%;width: 100%;">
                <ul class='bigpix_ul'>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/ma.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda1.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda2.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda3.png')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda4.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda5.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda6.png')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda7.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda8.png')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda9.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/new_bgs/agenda10.jpg')}}')"> </div> </li>
                </ul>
            </div>
            <div class="col-md-5 thebgdiv_" style="padding: 0px;position: relative;z-index: 9999999999999;">

                <div class="wrap-flex flex-column height-100 px-20 thecolorbg_">
                    <div class="logodiv">
                        <img src="{{asset('images/mdt_logo.png')}}" style="width: 100px;"/>
                    </div>
                    <div class="maindiv row" style="flex:4;">
                        <!-- <h1 class="thetitle mt-40"> The Mindanao Agenda </h1> -->
                        <!-- <div class="col-md-6">
                            <div class="ma_holder">
                                <img src="{{asset('storage/images/the_ma.jpg')}}" style="width: 350px;"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p> hello world </p>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-7 thebgblack_ thebgdiv" style="padding: 0px;position: relative;z-index: 9999999999999;">
               <div class="wrap-flex flex-column height-100 ">
                    <div class="wrap-flex flex-row space-even navdiv pagenavs pt-25">
                        <a href='#' class='the_agenda1'> ABOUT MDT </a>
                        <a href="#" class='the_agenda1'> THE MINDANAO AGENDA </a>
                        <a href="#" class='the_agenda1'> REPORTS </a>
                    </div>
                    <div class="maindiv thenavigation wrap-flex flex-column pl-20">
                        <div>
                            <h6 class='white-it' style="font-size: 22px;text-shadow: 0px 1px 2px #000;"> THE </h6>
                            <h1 class='white-it big-ma-text bold-it'> MINDANAO AGENDA <small style="font-size: 1.9rem !important;"> 2023-2028 </small> </h1>
                        </div>
                        <ul class='thelogo_small'>
                            <?php 
                                 if(count($agenda) > 0) {
                                    $count = 1;
                                    foreach($agenda as $a) { ?>
                                        <li class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                                <?php $image = asset('storage/images/ma_icons/')."/".$a->thelogo; ?>
                                                <img style="width:65px;" src="<?php echo $image; ?>" />
                                            </div>
                                            <div class="col-md-12 agenda_dets_marker <?php echo "the_agenda".$count; ?>" style="position:absolute; display:none;">
                                                <p> <?php echo $a->agendatitle; ?> </p>
                                                <h6 class="lh-25 theagendaname_small"> <?php echo $a->agendaname; ?> </h6>
                                                <p> <?php echo $a->thegoal; ?>  </p>
                                            </div>
                                        </li>
                                <?php $count++; } ?>
                            <?php } ?>
                        </ul>
                        <!-- <div>
                            <a href="{{url('mpap')}}"> <p class='thebutton_div'> PROGRAMS AND PROJECTS <i class="bi bi-arrow-right"></i> </p> </a>
                            <a href="{{url('rbme')}}"> <p class='thebutton_div'> EXPLORE DATA <i class="bi bi-arrow-right"></i> </p> </a>
                            <a href="#"> <p class='thebutton_dixv'> MINDANAO CONNECT <i class="bi bi-arrow-right"></i> </p> </a>
                        </div> -->
                    </div>
                    <div class="logodetailsdiv pl-20" style="flex:4;">
                        <!-- <h6 class='mb-20 theagenda'> The Mindanao Agenda </h6>  classname = agendalist -->
                        
                       <div class='wrap-flex flex-row gap_3 prevnextbtn'>
                            <div class="d-flex sponsors-img">
                                <img class='' src="{{asset('images/partners/minda_small.png')}}"/>
                                <img class='' src="{{asset('images/partners/bagongpil_small.png')}}"/>
                                <img class='' src="{{asset('images/partners/eu_small.png')}}"/> 
                                <img class='' src="{{asset('images/partners/gizcoop_small.png')}}"/>
                                <img class='' src="{{asset('images/partners/giz_small.png')}}"/> 
                                <img class="" src="{{asset('images/partners/usaid_small.png')}}"/>
                            </div>
                            <!-- <ul class='thelogo_small'>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/minda_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/bagongpil_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/eu_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/gizcoop_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/giz_small.png')}}"/> </li>
                                <li class='w-10-p mr-10'> <img class='w-100-p_' src="{{asset('images/partners/usaid_small.png')}}"/> </li>
                            </ul> -->
                            <!-- <button id='prevbtn' class='prevnext_btn'> <i class="bi bi-chevron-compact-left"></i> Previous </button>
                            <button id='nextbtn' class='prevnext_btn'> Next <i class="bi bi-chevron-compact-right"></i>  </button> -->
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{url('app/landingpage.js')}}"> </script>
</body>
</html>