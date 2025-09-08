<style>
    .major_navigation {
        position: fixed;
        left: 0px;
        top: 0px;
        bottom: 0px;
        height: 100%;
        width: 20%;
        display: flex;
        flex-direction: column;
        z-index: 1;
        background: #FFFFFF;
        background: -webkit-linear-gradient(-90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.41) 21%, rgba(255, 255, 255, 1) 74%);
        background: -moz-linear-gradient(-90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.41) 21%, rgba(255, 255, 255, 1) 74%);
        background: linear-gradient(-90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.41) 21%, rgba(255, 255, 255, 1) 74%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FFFFFF", endColorstr="#FFFFFF", GradientType=0);
    }

    .mainnavigation {
        padding-left: 0px;
    }

    .mainnavigation li {
        list-style: none;
        padding: 8px;
        background: #d3d3d3;
        margin-top: 3px;
        font-size: 15px;
        font-weight: bold;
        padding: 15px 17px;
        width: 88%;
        border-radius: 0px 10px 10px 0px;
        color: #454343;
        text-align: left;
        padding-left: 35px;
    }

    .mainnavigation li p {
        margin-bottom: 0px;
    }

    .mainnavigation li small {
        font-weight: normal;
    }

    .mainnavigation li a {
        color: inherit;
    }

    .mainnavigation li:hover {
        cursor: pointer;
        width: 95%;
        /* background: #f8d174; */

        transition: 1s width;
    }

    .selected_nav {
        width: 95% !important;
        background: #f8d174 !important;
    }

    .centerall {
        display: grid;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .alignallcenter {
        display: grid;
        align-items: center;
    }

    .bg-org {
        background: #FFFFFF;

        background: -webkit-linear-gradient(-90deg, rgba(255, 255, 255, 0) 29%, rgba(255, 195, 0, 0.23) 54%, rgba(255, 195, 0, 0.33) 79%);
        background: -moz-linear-gradient(-90deg, rgba(255, 255, 255, 0) 29%, rgba(255, 195, 0, 0.23) 54%, rgba(255, 195, 0, 0.33) 79%);
        background: linear-gradient(-90deg, rgba(255, 255, 255, 0) 29%, rgba(255, 195, 0, 0.23) 54%, rgba(255, 195, 0, 0.33) 79%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FFFFFF", endColorstr="#FFC300", GradientType=1);
    }

    .systemtitle {
        text-shadow: 0px 1px 1px #fff;
        color: #3c2b03;

        text-align: left;
        font-size: 25px;
    }

    .pl-16 {
        padding-left: 16px !important;
    }

    .mindaconbtn:hover {
        background: #ffc949;
    }

    .rbmebtn:hover {
        background: #f0d9a3;
    }

    .mpapbtn:hover {
        background: #ffd777;
    }

    .mdt_logo {
        width: 118px;
    }

    .bringdown {
        display: none;
        font-size: 40px !important;
    }

    .bringdown:hover {
        cursor: pointer;
        color:#333;
        font-weight: bolder;
    }

    .h-100 {
        height:100% !important;
    }

    /*mobile style*/
    /* Mobile styles */
    /* Mobile styles */

    @media (max-width: 1100px) {
        .major_navigation {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 0%;
            flex-direction: column;
            overflow-y: auto;
            background: #ffffff;
            background: linear-gradient(180deg, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 0.9) 100%);
            padding: 0;
            z-index: 999999999;

            transition: 1s height;
            transition: 1s width;
        }

        .major_navigation p,
        .major_navigation h1,
        .major_navigation h2,
        .major_navigation h3,
        .major_navigation h4,
        .major_navigation h5,
        .major_navigation h6,
        .major_navigation li {
            font-size:1.4rem !important;
        }

        .bringdown {
            display: block;
            position: absolute;
            top: 2vh;
            left: 2vh;
            z-index: 99999999999;
            background: #fff;
            border-radius: 99px;
            font-size: 4vh !important;
            padding: 10px;
        }

        .mdt_logo {
            width: 118px;
        }

        .logodiv {
            flex-direction: column;
            gap: 10px !important;
            padding: 0px !important;
        }

        .logodiv img {
            /* max-width: 90px;
        height: auto; */
            width: 25vh;
        }

        .bodydiv {
            padding: 5px 10px !important;
            text-align: center;
        }

        .systemtitle {
            font-size: 16px;
            text-align: center;
        }

        .mainnavigation {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .mainnavigation li {
            width: 100%;
            font-size: 13px;
            padding: 10px;
            margin: 2px 0;
            border-radius: 5px;
            text-align: center;
        }

        .mainnavigation li:hover,
        .selected_nav {
            background: #f8d174 !important;
            width: 100% !important;
        }

        .mainnavigation li p {
            font-size: 14px;
            margin-bottom: 2px;
        }

        .mainnavigation li small {
            font-size: 12px;
        }

        #top_navigation_ma_rbme {
            width: 100%;
            margin: 0px auto;
        }

        .addBorderRadius {
            border-radius: 100px;
        }

        .borderradius {
            border-radius: none;
        }
    }

    /*end of mobile style*/
</style>

<?php
$rbme = false;
$mpap = false;
$mcon = false;
$logo_size = null;

$title = null;

if ($navigation == "rbme") {
    $rbme = "selected_nav";
    $title = "TRACK THE MINDANAO AGENDA";
} else if ($navigation == "mpap") {
    $mpap = "selected_nav";
    $title = "MINDANAO PROGRAMS AND PROJECTS";
} else if ($navigation == "mindaconnect") {
    $mcon = "selected_nav";
    $title = "Mindanao Connect";
    $logo_size = "style='width:70%;'";
}

?>
<i class="bi bi-list bringdown"></i>
<div class="major_navigation">
    <div class="logodiv centerall mb-5 p-5 d-flex gap-5">
        <img src="{{asset('images/mdt_logo.png')}}" class='mdtlogo' <?php echo $logo_size; ?>/>
        <!-- <img class='' src="{{asset('images/partners/minda_small.png')}}" /> -->
    </div>
    <div class="bodydiv centerall mb-5 bg-org p-10">
        <h4 class='systemtitle'> <?php echo $title; ?> </h4>
    </div>
    <div class="contentdiv pt-10">
        <h6 class="pl-16"> Main Navigation </h6>
        <ul class="mainnavigation">
            <li class="<?php echo $rbme; ?> rbmebtn">
                <a href="{{url('tracker/rbme')}}">
                    <p> <strong> TRACK THE MINDANAO AGENDA </strong> </p>
                    <small> Digital Results-based and Monitoring System</small>
                </a>
            </li>
            <li class="<?php echo $mpap; ?> mpapbtn">
                <a href="{{url('tracker/mpap')}}">
                    <p> <strong> MPAP </strong> </p>
                    <small> Mindanao Programs and Projects </small>
                </a>
            </li>
            <li class="mindaconbtn <?php echo $mcon; ?>"> <a href="{{route('login')}}">
                    <p> <strong> MINDA CONNECT </strong> </p>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    var bringdown = false;
    $(document).on("click",".bringdown", function() {
        if(bringdown) {
            bringdown = false;
            $(document).find(".major_navigation").removeClass("h-100 w-100");
            $(this).addClass("bi-list");
            $(this).removeClass("bi-x-lg");
        } else {
            bringdown = true;
            $(document).find(".major_navigation").addClass("h-100 w-100");
            $(this).removeClass("bi-list");
            $(this).addClass("bi-x-lg");
        }
    });
</script>