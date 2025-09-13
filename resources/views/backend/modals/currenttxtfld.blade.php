<?php 
    $current  = null;
    // $baseline = null;
    // $target   = null;
    $dbid     = null;
    $name     = null;
    $class    = "fieldtext_new";

    if (count($collection) > 0) {
        $current  = $collection[0]->current;
        // $baseline = $collection[0]->baseline;
        // $target   = $collection[0]->target;
        $name     = $collection[0]->thedisaggregation;
        $dbid     = $collection[0]->valuesid;
        $class    = "fieldtext";
    }
?>
<div>
    <label> Current </label>
     <input type="text" class='form-control mb-2 <?php echo $class; ?>' 
            id = "currentval"
            data-field="current" 
            data-table = "the_values"
            data-keyid_fld = "valuesid"
            value="<?php echo number_format($current,2); ?>"
            data-dbid="<?php echo $dbid; ?>"/> 
</div>

<?php 
    if (count($collection) == 0) {
        echo "<button class='btn btn-primary btn-sm savenewvalue'> Save </button>";
    }
?>