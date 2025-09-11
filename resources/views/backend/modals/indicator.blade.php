<?php if (count($collection) > 0) { // dd($collection); ?>
    <?php for($i = 0; $i <= count($collection)-1; $i++) { ?>
        <div class="odd px-3" id="kpiid_<?php echo $i; ?>">
            <div class="row">
                <div class="col-md-4 d-flex pe-0 align-items-center" data-kt-ecommerce-edit-order-filter="product" data-kt-ecommerce-edit-order-id="product_1">
                    <div class="" style="width: 100%;">
                        <!-- <p class="text-gray-800 text-hover-primary fs-5 fw-bold " style="cursor:pointer;"> -->
                            <span class="badge">Indicator Name</span>
                            <input type="text" class='form-control fieldtext' 
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
                            <div class=''> 
                                <label class="btn btn-light btn-sm kpitab" 
                                        data-outcomeid = "<?php echo $collection[$i]->fkoutcomeid; ?>"
                                        data-displayto = "disaggregation_<?php echo $i; ?>"
                                        data-kpiid = "<?php echo $collection[$i]->outputid; ?>">
                                <i class="ki-outline ki-pencil fs-30 text-hover-primary" > </i> Edit Disaggregation </label>
                                <label class="btn btn-light btn-sm deletethis" data-remove='#kpiid_<?php echo $i; ?>' data-tbl="the_outputs" data-keyfld="outputid" data-keyid="<?php echo $collection[$i]->outputid; ?>"> <i class="bi bi-trash3 fs-30 text-hover-danger"> </i> Delete </label>
                            </div>
                        </div>
                        <!-- <div class="text-muted fs-7">SKU: 04423008</div> -->    
                    </div>
                </div>
                <div class="text-start pe-0 col-md-2">
                    <span class="badge">Indicator Weight</span>
                    <input type = "text" 
                            class="form-control fieldtext" 
                            data-field="theweight" 
                            data-table = "the_outputs"
                            data-keyid_fld = "outputid"
                            value = "<?php echo $collection[$i]->theweight; ?>"
                            data-dbid="<?php echo $collection[$i]->outputid; ?>"/>
                </div>
                <div class="text-start pe-0 col-md-2">
                    <span class="badge">Frequency</span>
                    <span class="fw-bold"> 
                        <select class="form-select fieldtext" 
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
                <div class="text-start pe-0 col-md-2">
                    <span class="badge">Type of value</span>
                    <span class="fw-bold">
                        <select class="form-select fieldtext"
                                data-field="thetype" 
                                data-table = "the_outputs"
                                data-keyid_fld = "outputid"
                                data-dbid="<?php echo $collection[$i]->outputid; ?>">
                            <option value='percentage'> Percentage </option>
                            <option value='integer'> Integer </option>
                        </select>
                    </span>
                </div>
                <div class="text-start pe-0 col-md-2">
                    <span class="badge">Year</span>
                    <span class="fw-bold">
                        <select class="form-select selectchange">
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