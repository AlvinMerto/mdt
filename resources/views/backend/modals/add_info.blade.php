<?php if (count($collection) > 0) {?>
<div class="row mb-2">
    <div class="col-md-4">
        <label> Name </label>
        <input type="text" class='form-control fieldtext'
            id="nameval" ;
            data-field="thedisaggregation"
            data-table="the_values"
            data-keyid_fld="valuesid"
            value="<?php echo $collection[0]->thedisaggregation; ?>"
            data-dbid="<?php echo $collection[0]->dv_id; ?>" />
    </div>

    <div class="col-md-4">
        <label> Baseline </label>
        <input type="text" class='form-control mb-2 fieldtext'
            id="baselineval"
            data-field="baseline"
            data-table="the_values"
            data-keyid_fld="valuesid"
            value="<?php echo number_format($collection[0]->baseline,2); ?>"
            data-dbid="<?php echo $collection[0]->dv_id; ?>" />
    </div>

    <div class="col-md-4">
        <label> Target </label>
        <input type="text" class='form-control mb-2 fieldtext'
            id="targetval"
            data-field="target"
            data-table="the_values"
            data-keyid_fld="valuesid"
            value="<?php echo number_format($collection[0]->target,2); ?>"
            data-dbid="<?php echo $collection[0]->dv_id; ?>" />
    </div>
</div>
<?php } else { ?>
<h6> Add New data for this location </h6>
<div class="row mb-2">
    <div class="col-md-4">
        <label> Name </label>
        <input type="text" class='form-control'
            id="nameval"/>
    </div>

    <div class="col-md-4">
        <label> Baseline </label>
        <input type="text" class='form-control mb-2'
            id="baselineval" />
    </div>

    <div class="col-md-4">
        <label> Target </label>
        <input type="text" class='form-control mb-2'
            id="targetval"/>
    </div>
    <!-- <div class="col-md-3">
        <p class="mb-2"> &nbsp; </p>
        <button class="btn btn-primary btn-sm" id="savethisnewlocation"> Save </button>
    </div> -->
</div>
<?php } ?>

