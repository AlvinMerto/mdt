<div id="inside_disagg">
<!--begin::Heading-->
    <div class="d-flex align-items-center gap-2 gap-lg-3 mb-5" style="justify-content: space-between;">
        <h6 class="text-dark">Disaggregation</h6>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="#" class="btn btn-sm btn-flex btn-light-primary h-32px fs-7 fw-bold" id="addnewdisagg">Add Disaggregation</a>
        </div>
    </div>
    <!--end::Heading-->
    <!--begin::Body-->
    <div class="pt-1" id="">
        <div class="row">
            <div class="col-md-4">
                <ul class='disagg_list'>
                    <?php if (count($disaggregation)>0) { ?>
                        <?php for($i=0;$i<=count($disaggregation)-1;$i++) { ?>
                            <li id="deepvals_<?php echo $disaggregation[$i]->valuesid; ?>" class='disagg_dets' data-outcomeid = "<?php echo $outcomeid; ?>" 
                                                    data-dis_val="<?php echo $disaggregation[$i]->valuesid; ?>"> 
                                                    <?php echo $disaggregation[$i]->thedisaggregation; ?> 
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>

            </div>
            <div class="col-md-8">
                <span id="disagg_details"></span>
            </div>
        </div>
    </div>
<!--end::Body-->
</div>