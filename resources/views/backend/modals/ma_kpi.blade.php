<?php
    $fieldtext = "fieldtext";

    if ($collection == "new") {
        $fieldtext = null;
?>
        <form action="{{ route('dashboard') }}" method="POST" enctype="multipart/form-data">
        @csrf

<?php } ?>

<div class="row">
    <div class="col-md-6">
        <!--begin::Label-->
        <label class="required form-label">The Indicator</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" 
                name= "theindicator";
                class="form-control mb-2 <?php echo $fieldtext; ?>" 
                placeholder="-- here --" 
                data-field="theindicator" 
                data-table = "macro_indicators"
                data-keyid_fld = "ma_id"
                value="<?php echo ($collection != "new")?$collection[0]->theindicator:""; ?>"
                data-dbid="<?php echo ($collection != "new")?$collection[0]->ma_id:""; ?> "/> 
        <!--end::Input-->
        <!--begin::Description-->
        <div class="text-muted fs-7">Enter the product SKU.</div>
        <!--end::Description-->
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    <div class="col-md-6">
        <!--begin::Label-->
        <label class="required form-label">Value</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text"
                name= "ma_value";
                class="form-control mb-2 <?php echo $fieldtext; ?>" 
                placeholder="-- here --" 
                data-field="ma_value" 
                data-table = "macro_indicators"
                data-keyid_fld = "ma_id"
                value="<?php echo ($collection != "new")?$collection[0]->ma_value:""; ?>"
                data-dbid="<?php echo ($collection != "new")?$collection[0]->ma_id:""; ?> "/> 
        <!--end::Input-->
        <!--begin::Description-->
        <div class="text-muted fs-7">Enter the product SKU.</div>
        <!--end::Description-->
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    <div class="col-md-6">
        <!--begin::Label-->
        <label class="required form-label">Text</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" 
                name= "smalltext";
                class="form-control mb-2 <?php echo $fieldtext; ?>" 
                placeholder="-- here --" 
                data-field="smalltext" 
                data-table = "macro_indicators"
                data-keyid_fld = "ma_id"
                value="<?php echo ($collection != "new")?$collection[0]->smalltext:""; ?>"
                data-dbid="<?php echo ($collection != "new")?$collection[0]->ma_id:""; ?> "/> 
        <!--end::Input-->
        <!--begin::Description-->
        <div class="text-muted fs-7">Enter the product SKU.</div>
        <!--end::Description-->
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    <div class="col-md-6">
        <!--begin::Label-->
        <label class="required form-label">Trend</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control mb-2 <?php echo $fieldtext; ?>" 
                data-field="trend" 
                name= "trend";
                data-table = "macro_indicators"
                data-keyid_fld = "ma_id"
                data-dbid="<?php echo ($collection != "new")?$collection[0]->ma_id:""; ?> "> 
            <?php 
                $up   = null;
                $down = null;
                if ($collection != "new") {
                    if ($collection[0]->trend == "up") { 
                        $up = "selected";      
                    } else { 
                        $down = "selected";
                    }
                }
            ?>
                
            <option value='up' <?php echo $up; ?>> UP </option>
            <option value='down' <?php echo $down; ?>> DOWN </option>
        </select>
        <!--end::Input-->
        <!--begin::Description-->
        <div class="text-muted fs-7">Enter the product SKU.</div>
        <!--end::Description-->
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    <div class="col-md-6">
        <!--begin::Label-->
        <label class="required form-label">Year</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control mb-2 <?php echo $fieldtext; ?>" 
                data-field="theyear" 
                name= "theyear";
                data-table = "macro_indicators"
                data-keyid_fld = "ma_id"
                data-dbid="<?php echo ($collection != "new")?$collection[0]->ma_id:""; ?> "> 
            <?php 
                for($i=2025;$i>=2016;$i--) { 
                    $selected = null;

                    if ($collection != "new") {
                        if ($collection[0]->theyear == $i) {
                            $selected = "selected";
                        } 
                    }
                ?>

                <option value='<?php echo $i; ?>' <?php echo $selected; ?>> <?php echo $i; ?> </option>
            <?php } ?>
        </select>
        <!--end::Input-->
        <!--begin::Description-->
        <div class="text-muted fs-7">Enter the product SKU.</div>
        <!--end::Description-->
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
    </div>
    <?php if ($collection == "new") { ?>
        <div class="col-md-12">
            <input type="submit" value="Save" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"/>
        </div>
        </form>
    <?php } ?>
</div>