<div class="d-flex gap-1 mb-5" style="justify-content: space-around;">
    <div>
        <label> Region </label>
        <select class='form-control mb-2 fieldtext' id="thelocation">
            <option value='9'> 9 </option>
            <option value='10'> 10 </option>
            <option value='11'> 11 </option>
            <option value='12'> 12 </option>
            <option value='13'> 13 </option>
            <option value='barmm'> BARMM </option>
        </select>
    </div>
    <div>
        <label> Name </label>
        <input type="text" class='form-control fieldtext'
            data-field="thedisaggregation"
            data-table="the_deep_values"
            data-keyid_fld="dv_id"
            value="<?php echo $collection[0]->thedisaggregation; ?>"
            data-dbid="<?php echo $collection[0]->dv_id; ?> " />
    </div>
    <div>
        <label> Baseline </label>
        <input type="text" class='form-control mb-2 fieldtext'
            data-field="baseline"
            data-table="the_deep_values"
            data-keyid_fld="dv_id"
            value="<?php echo $collection[0]->baseline; ?>"
            data-dbid="<?php echo $collection[0]->dv_id; ?>" />
    </div>
    <div>
        <label> Target </label>
        <input type="text" class='form-control mb-2 fieldtext'
            data-field="target"
            data-table="the_deep_values"
            data-keyid_fld="dv_id"
            value="<?php echo $collection[0]->target; ?>"
            data-dbid="<?php echo $collection[0]->dv_id; ?>" />
    </div>
</div>

<ul class='nav d-flex gap-1 tabindex_year'>
    <?php
    for ($i = $outcome_years[0]->yearend; $i >=  $outcome_years[0]->yearstart; $i--) {
        echo "<li data-dvid='{$collection[0]->dv_id}' data-theval='{$i}'>{$i}</li>";
    }
    ?>
</ul>
<div class="thedisplaydiv">
    <label> Value </label>
    <span id="currentextfld"> </span>
</div>

<button class='btn btn-danger btn-sm mt-2 deletethis' 
        data-tbl="the_deep_values"
        data-keyid="<?php echo $collection[0]->dv_id; ?>" 
        data-keyfld="dv_id" 
        data-remove="#deepvals_<?php echo $collection[0]->dv_id; ?>" 
        data-clean="#disagg_details"
        style="float:right;">Delete </button>