<?php

    $route = explode("/",Route::current()->uri());

    $main  = null;
    $rbme  = null;
    $mpap  = null;

    if (isset($route[2])) {
        switch($route[2]) {
            case "mpap":
                $mpap = "active";
                break;
            case "rbme":
                $rbme = "active";
                break;
        }
    } else {
       $main = "active";
    }


?>
<!--begin::Navbar-->

<div class="card mb-6 mb-xl-9">
    <div class="card-body pt-0 pb-0">
        <!--begin::Nav-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <?php if ($userprofile[0]->powerlevel == 0) { ?>
                <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6 <?php echo $main; ?>" href="{{route('dashboard')}}">Macro Indicators</a>
                    </li>
                <!--end::Nav item-->
            <?php } ?>

            <?php if ($userprofile[0]->powerlevel == 0 || $userprofile[0]->powerlevel == 10) { ?>
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 <?php echo $rbme; ?>" href="{{route('rbme')}}">RBME</a>
                </li>
                <!--end::Nav item-->
            <?php } ?>

            <?php if ($userprofile[0]->powerlevel != 0 || $userprofile[0]->powerlevel != 10) { ?>
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 <?php echo $mpap; ?>" href="{{route('mpapbackend')}}">MPAP</a>
                </li>
                <!--end::Nav item-->
            <?php } ?>
        </ul>
        <!--end::Nav-->
    </div>
</div>
<!--end::Navbar-->