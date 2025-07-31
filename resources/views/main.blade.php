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
            <div class="col-md-8 thebgdiv">
                <ul class='bigpix_ul'>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda1.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda2.png')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda3.png')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda4.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda5.png')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda6.png')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda7.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda8.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda9.jpg')}}')"> </div> </li>
                    <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda10.jpg')}}')"> </div> </li>
                </ul>
                <div class="wrap-flex flex-column height-100 px-20 thecolorbg_">
                    <div class="logodiv">
                        <img src="{{asset('images/mdt_logo.png')}}" style="width: 100px;"/>
                    </div>
                    <div class="maindiv row" style="flex:4;">
                        <h1 class="thetitle mt-40"> The Mindanao Agenda </h1>
                        <!-- <div class="col-md-6">
                            <div class="ma_holder">
                                <img src="{{asset('storage/images/the_ma.jpg')}}" style="width: 350px;"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p> hello world </p>
                        </div> -->
                    </div>
                    <div class="logodetailsdiv infoholder">
                        <ul id="thebig_slide">
                            <?php 
                                if(count($agenda) > 0) {
                                    foreach($agenda as $a) { ?>
                                        <li class="row">
                                            <div class="col-md-9">
                                                <h5 class='agendatitle'> <?php echo $a->agendatitle; ?>  </h5>
                                                <h1 class='theagenda'> <?php echo $a->agendaname; ?> </h1>
                                                <p> <?php echo $a->thegoal; ?> </p>
                                            </div>
                                            <div class="col-md-3">
                                                <?php $image = asset('storage/images/ma_icons/')."/".$a->thelogo; ?>
                                                <img class="ma_icons" src="<?php echo $image; ?>" />
                                            </div>
                                        </li>
                            <?php  }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 thebgdiv_" style="padding: 0px;">
               <div class="wrap-flex flex-column height-100 ">
                    <!-- <ul class='bigpix_ul'>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda1.jpg')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda2.png')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda3.png')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda4.jpg')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda5.png')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda6.png')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda7.jpg')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda8.jpg')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda9.jpg')}}')"> </div> </li>
                        <li> <div class="imagebgholder" style="background-image:url('{{asset('storage/images/bgs/agenda10.jpg')}}')"> </div> </li>
                    </ul> -->
                    <div class="wrap-flex flex-row space-even logodiv pagenavs pt-25">
                        <a href='#' class='the_agenda1'> ABOUT MDT </a>
                        <a href="#" class='the_agenda1'> THE MINDANAO AGENDA </a>
                        <a href="#" class='the_agenda1'> REPORTS </a>
                    </div>
                    <div class="maindiv thenavigation wrap-flex flex-column pl-20">
                        <div>
                            <!-- <img src="{{asset('storage/images/partners.png')}}"/> -->
                        </div>
                        <div>
                            <a href="{{url('mpap')}}"> <p class='thebutton_div'> PROGRAMS AND PROJECTS <i class="bi bi-arrow-right"></i> </p> </a>
                            <a href="{{url('rbme')}}"> <p class='thebutton_div'> EXPLORE DATA <i class="bi bi-arrow-right"></i> </p> </a>
                            <a href="#"> <p class='thebutton_dixv'> MINDANAO CONNECT <i class="bi bi-arrow-right"></i> </p> </a>
                        </div>
                    </div>
                    <div class="logodetailsdiv pl-20" style="flex:5; padding-top: 8rem;">
                        <!-- <h6 class='mb-20 theagenda'> The Mindanao Agenda </h6> -->
                        <ul class='agendalist'>
                            <?php 
                                 if(count($agenda) > 0) {
                                    foreach($agenda as $a) { ?>
                                        <li class="row theperitem">
                                            <div class="col-md-7">
                                                <p> <?php echo $a->agendatitle; ?> </p>
                                                <h6 class="lh-25"> <?php echo $a->agendaname; ?> </h6>
                                            </div>
                                            <div class="col-md-5" style="text-align: right;">
                                                <?php $image = asset('storage/images/ma_icons/')."/".$a->thelogo; ?>
                                                <img style="width:100px;" src="<?php echo $image; ?>" />
                                            </div>
                                        </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                       <div class='wrap-flex flex-row gap_3 prevnextbtn'>
                            <button id='prevbtn' class='prevnext_btn'> <i class="bi bi-chevron-compact-left"></i> Previous </button>
                            <button id='nextbtn' class='prevnext_btn'> Next <i class="bi bi-chevron-compact-right"></i>  </button>
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