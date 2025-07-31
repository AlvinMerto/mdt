<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Finances for <?php echo $collection[0]->columnplace; ?></h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <!-- begin::fv-row -->
        <div class="fv-row">
            <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                <div class='mb-5'>
                    <!--begin::Input group-->
                    <!--begin::Label-->
                    <label class="form-label">Project Amount</label>
                    <!--end::Label-->
                    <!--begin::Select2-->
                    <input type='text' id="projectamount"
                          class="form-control mb-2 fieldtext" 
                          data-field="projectamount"
                          data-table="financetbls" 
                          data-keyid_fld="fid" 
                          data-dbid="<?php echo $collection[0]->fid; ?> "
                          value="<?php echo $collection[0]->projectamount; ?>" />
                    <!--begin::Description-->
                    <div class="text-muted fs-7 badge badge-light-success fs-base"><?php echo number_format($collection[0]->projectamount,2); ?></div>
                    <!--end::Description-->
                    <!--end::Select2-->
                    <!--end::Input group-->
                </div>
                <div class='mb-5'>
                    <!--begin::Input group-->
                    <!--begin::Label-->
                    <label class="form-label">Amount Disbursed</label>
                    <!--end::Label-->
                    <!--begin::Select2-->
                    <input type='text' class="form-control mb-2 fieldtext" data-field="amountdisbursed"
                        data-table="financetbls" data-keyid_fld="fid" data-dbid="<?php echo $collection[0]->fid; ?> "
                        value="<?php echo $collection[0]->amountdisbursed; ?>" />
                    <!--end::Select2-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7 badge badge-light-success fs-base"><?php echo number_format($collection[0]->amountdisbursed,2); ?></div>
                    <!--end::Description-->
                    <!--end::Input group-->
                </div>
                <div class='mb-5'>
                    <!--begin::Input group-->
                    <!--begin::Label-->
                    <label class="form-label">Cost relating to Gender</label>
                    <!--end::Label-->
                    <!--begin::Select2-->
                    <input type='text' class="form-control mb-2 fieldtext" data-field="costtogender"
                        data-table="financetbls" data-keyid_fld="fid" data-dbid="<?php echo $collection[0]->fid; ?> "
                        value="<?php echo $collection[0]->costtogender; ?>" />
                    <!--end::Select2-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7 badge badge-light-success fs-base"><?php echo number_format($collection[0]->costtogender,2); ?></div>
                    <!--end::Description-->
                    <!--end::Input group-->
                </div>
            </div>
            <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                <div class='mb-5'>
                    <!--begin::Input group-->
                    <!--begin::Label-->
                    <label class="form-label">Project Amount Per Site</label>
                    <!--end::Label-->
                    <!--begin::Select2-->
                    <input type='text' class="form-control mb-2 fieldtext" id="amountperprojectsite" data-field="projectamountpersite"
                        data-table="financetbls" data-keyid_fld="fid" data-dbid="<?php echo $collection[0]->fid; ?> "
                        value="<?php echo $collection[0]->projectamountpersite; ?>" />
                    <!--end::Select2-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7 ">It's important to enter the project cost per location. </div>
                    <!--end::Description-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7 badge badge-light-success fs-base mt-2"><?php echo number_format($collection[0]->projectamountpersite,2); ?></div>
                    <!--end::Description-->
                    <!--end::Input group-->
                </div>
            </div>
            <br/>
            <label> 
                <input type="checkbox" id='computeinmil'/> Compute in Millions
            </label>
        </div>
        <!-- end::fv-row -->
    </div>
</div>