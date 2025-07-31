<?php

    $route = explode("/",Route::current()->uri());

    $main  = null;
    $rbme  = null;
    $mpap  = null;

    if (isset($route[1])) {
        switch($route[1]) {
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
            <!--begin::Nav item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 <?php echo $main; ?>" href="{{route('dashboard')}}">Macro Indicators</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 <?php echo $rbme; ?>" href="{{route('rbme')}}">RBME</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary py-5 me-6 <?php echo $mpap; ?>" href="{{route('mpapbackend')}}">MPAP</a>
            </li>
            <!--end::Nav item-->
        </ul>
        <!--end::Nav-->
    </div>
</div>
<!--end::Navbar-->