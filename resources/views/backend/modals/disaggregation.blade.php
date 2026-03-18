<div id="inside_disagg">
<!--begin::Heading-->
    <div class="d-flex align-items-center gap-2 gap-lg-3 mb-5" style="justify-content: space-between;">
        <h6 class="text-dark">Disaggregation</h6>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="#" class="text-sm font-semibold text-blue-600 bg-blue-50 px-4 py-1.5 rounded-full hover:bg-blue-600 hover:text-white transition-all" id="addnewdisagg">+ Add Disaggregation</a>
        </div>
    </div>
    <!--end::Heading-->
    <!--begin::Body-->
    <div class="pt-1" id="">
        <div class="row">
            <div class="col-md-3 bg-gray-50 rounded-xl p-2 border border-gray-100 min-h-[200px]">
                <ul class='disagg_list'>
                    <?php if (count($disaggregation)>0) { ?>
                        <?php for($i=0;$i<=count($disaggregation)-1;$i++) { ?>
                            <li id="deepvals_<?php echo $disaggregation[$i]->dv_id; ?>" class='p-3 bg-white shadow-sm border border-blue-200 rounded-lg text-blue-700 font-semibold text-sm flex justify-between items-center disagg_dets' data-outcomeid = "<?php echo $outcomeid; ?>" 
                                                    data-dis_val="<?php echo $disaggregation[$i]->dv_id; ?>"> 
                                                    <?php echo $disaggregation[$i]->thedisaggregation; ?> 
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>

            </div>
            <div class="col-md-9">
                <span id="disagg_details"></span>
            </div>
        </div>
    </div>
<!--end::Body-->
</div>