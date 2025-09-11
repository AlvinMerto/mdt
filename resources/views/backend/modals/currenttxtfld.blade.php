<?php 
    $current  = null;
    $baseline = null;
    $target   = null;
    $dbid     = null;
    $name     = null;
    $class    = "fieldtext_new";

    if (count($collection) > 0) {
        $current  = $collection[0]->current;
        $baseline = $collection[0]->baseline;
        $target   = $collection[0]->target;
        $name     = $collection[0]->thedisaggregation;
        $dbid     = $collection[0]->valuesid;
        $class    = "fieldtext";
    }
?>
<div>
    <label> Current </label>
     <input type="text" class='form-control mb-2 <?php echo $class; ?>' 
            data-field="current" 
            data-table = "the_values"
            data-keyid_fld = "valuesid"
            value="<?php echo $current; ?>"
            data-dbid="<?php echo $dbid; ?>"/> 
</div>

<div>
        <label> Name </label>
        <input type="text" class='form-control fieldtext'
            data-field="thedisaggregation"
            data-table="the_values"
            data-keyid_fld="valuesid"
            value="<?php echo $name; ?>"
            data-dbid="<?php echo $dbid; ?> " />
</div>

<div>
        <label> Baseline </label>
        <input type="text" class='form-control mb-2 <?php echo $class; ?>'
            data-field="baseline"
            data-table="the_values"
            data-keyid_fld="valuesid"
            value="<?php echo $baseline; ?>"
            data-dbid="<?php echo $dbid; ?>" />
    </div>
    <div>
        <label> Target </label>
        <input type="text" class='form-control mb-2 <?php echo $class; ?>'
            data-field="target"
            data-table="the_values"
            data-keyid_fld="valuesid"
            value="<?php echo $target; ?>"
            data-dbid="<?php echo $dbid; ?>" />
    </div>
<?php 
    if (count($collection) == 0) {
        echo "<button class='btn btn-primary btn-sm savenewvalue'> Save </button>";
    }
?>