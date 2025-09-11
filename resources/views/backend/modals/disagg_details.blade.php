<div class="d-flex gap-1 mb-5" style="justify-content: space-around;">
    <div class='w-100'>
        <label> Region </label>
        <select class='form-control mb-2 fieldtext thelocation' id="thelocation">
            <option value='9'> 9 </option>
            <option value='10'> 10 </option>
            <option value='11'> 11 </option>
            <option value='12'> 12 </option>
            <option value='13'> 13 </option>
            <option value='barmm'> BARMM </option>
        </select>
    </div>


</div>

<ul class='nav d-flex gap-1 tabindex_year'>
    <?php
    for ($i = $outcome_years[0]->yearend; $i >=  $outcome_years[0]->yearstart; $i--) {
        echo "<li data-dvid='{$collection[0]->valuesid}' data-theval='{$i}'>{$i}</li>";
    }
    ?>
</ul>
<div class="thedisplaydiv">
    <span id="currentextfld"> </span>
</div>

<button class='btn btn-danger btn-sm mt-2 deletethis' 
        data-tbl="the_values"
        data-keyid="<?php echo $collection[0]->valuesid; ?>" 
        data-keyfld="valuesid" 
        data-remove="#deepvals_<?php echo $collection[0]->valuesid; ?>" 
        data-clean="#disagg_details"
        style="float:right;">Delete </button>