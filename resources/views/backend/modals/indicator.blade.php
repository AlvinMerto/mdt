
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<?php if (count($collection) > 0) { // dd($collection); ?>
    <?php for($i = 0; $i <= count($collection)-1; $i++) { ?>
        <div class="card odd p-3 mb-7" id="kpiid_<?php echo $i; ?>">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                    <div class="" style="width: 100%;">
                        <!-- <p class="text-gray-800 text-hover-primary fs-5 fw-bold " style="cursor:pointer;"> -->
                            <span class="badge">Indicator Name</span>
                            <input type="text" class='form-control fieldtext w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 input-focus' 
                                    data-field="kpi" 
                                    data-table = "the_outputs"
                                    data-keyid_fld = "outputid"
                                    value="<?php echo $collection[$i]->kpi; ?>"
                                    data-dbid="<?php echo $collection[$i]->outputid; ?>"/> 
                        <!-- </p> -->
                        <div class="fw-semibold fs-7 my-2 d-flex gap-3"> 
                            <!-- <div style="padding: 9px;">
                                <span class="badge badge-light-warning"> Weight: </span>
                                <span class="fw-bold text-warning ms-3">
                                    <?php // echo $collection[$i]->theweight; ?> 
                                </span>
                            </div> -->
                            <div class='flex flex-wrap gap-3'> 
                                <button class="flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-lg font-medium hover:bg-blue-100 transition-colors text-sm kpitab" 
                                        data-outcomeid = "<?php echo $collection[$i]->fkoutcomeid; ?>"
                                        data-displayto = "disaggregation_<?php echo $i; ?>"
                                        data-kpiid = "<?php echo $collection[$i]->outputid; ?>">
                                <i class="fa-solid fa-pen-to-square" > </i> Edit Disaggregation </button>
                                <button class="flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 rounded-lg font-medium hover:bg-red-100 transition-colors text-sm deletethis" data-remove='#kpiid_<?php echo $i; ?>' data-tbl="the_outputs" data-keyfld="outputid" data-keyid="<?php echo $collection[$i]->outputid; ?>"> <i class="fa-solid fa-trash-can"> </i> Delete </button>
                            </div>
                        </div>
                        <!-- <div class="text-muted fs-7">SKU: 04423008</div> -->    
                    </div>
                </div>
                <div class="text-start col-md-2">
                    <span class="badge">Indicator Weight</span>
                    <input type = "text" 
                            class="form-control fieldtext w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 input-focus" 
                            data-field="theweight" 
                            data-table = "the_outputs"
                            data-keyid_fld = "outputid"
                            value = "<?php echo $collection[$i]->theweight; ?>"
                            data-dbid="<?php echo $collection[$i]->outputid; ?>"/>
                </div>
                <div class="text-start col-md-2">
                    <span class="badge">Frequency</span>
                    <span class="fw-bold"> 
                        <select class="form-select fieldtext w-full appearance-none px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus cursor-pointer" 
                                data-field="frequency" 
                                data-table = "the_outputs"
                                data-keyid_fld = "outputid"
                                data-dbid="<?php echo $collection[$i]->outputid; ?>">
                            <option value='yearly'> Yearly </option>
                            <option value='quarterly'> Quarterly </option>
                            <option value='monthly'> Monthly </option>
                        </select>
                    </span>
                </div>
                <div class="text-start col-md-2">
                    <span class="badge">Type of value</span>
                    <span class="fw-bold">
                        <select class="form-select fieldtext w-full appearance-none px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus cursor-pointer"
                                data-field="thetype" 
                                data-table = "the_outputs"
                                data-keyid_fld = "outputid"
                                data-dbid="<?php echo $collection[$i]->outputid; ?>">
                            <option value='percentage'> Percentage </option>
                            <option value='integer'> Integer </option>
                        </select>
                    </span>
                </div>
                <div class="text-start col-md-2">
                    <span class="badge">Year</span>
                    <span class="fw-bold">
                        <select class="form-select selectchange w-full appearance-none px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus cursor-pointer">
                            <?php for($year = 2025 ; $year >= 2016 ; $year--) {?>
                                <option> <?php echo $year; ?> </option>
                            <?php } ?>
                        </select>
                    </span>
                </div>
                <div class="tab-pane fade show active disaggregationdiv" id="disaggregation_<?php echo $i; ?>">
					
				</div>
            </div>
            <!-- <td class="text-end pe-5" data-order="1">    -->
            <!-- <span class="badge badge-light-warning">Weight Per indicator</span>
            <span class="fw-bold text-warning ms-3"><?php // echo $collection[$i]->theweight; ?></span> -->
            <!-- </td> -->
        </div>
    <?php } ?>
<?php } ?>