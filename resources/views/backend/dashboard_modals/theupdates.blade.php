
<?php if (count($updatest) > 0) { ?>
    <?php foreach($updatest as $up) { ?>
    <?php 
        $thedate = \Carbon\Carbon::parse($up->created_at);
    ?>
        <div class="m-0">
            <!--begin::Timeline-->
            <div class="timeline ms-n1">
                <!--begin::Timeline item-->
                <div class="timeline-item align-items-center mb-4">
                    <!--begin::Timeline line-->
                    <div class="timeline-line w-20px mt-12 mb-n14"></div>
                    <!--end::Timeline line-->
                    <!--begin::Timeline icon-->
                    <div class="timeline-icon pt-1" style="margin-left: 0.7px">
                        <i class="ki-outline ki-cd fs-2 text-success"></i>
                    </div>
                    <!--end::Timeline icon-->
                    <!--begin::Timeline content-->
                    <div class="timeline-content m-0">
                        <!--begin::Label-->
                        <span class="fs-8 fw-bolder text-success text-uppercase"><?php echo $up->name; ?></span>
                        <!--begin::Label-->
                        <!--begin::Title-->
                        <a href="#" class="fs-6 text-gray-800 fw-bold d-block text-hover-primary"><?php echo $up->theupdate; ?></a>
                        <!--end::Title-->
                        <!--begin::Title-->
                        <span class="fw-semibold text-gray-400">{{ $thedate->diffForHumans() }}</span>
                        <!--end::Title-->
                    </div>
                    <!--end::Timeline content-->
                </div>
                <!--end::Timeline item-->
            </div>
            <!--end::Timeline-->
        </div>
    <?php } ?>
<?php } ?>