<?php 
    function checkinput($value) {
        if (preg_match('/^-?[0-9]+(\.[0-9]+)?$/', $value)) {
            return "int";
        } else {
            return "mix";
        }
    }

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

        if (checkinput($current) == "int") {
            $current = number_format($current,2);
        } else {
            $current = $current;
        }
    }
?>
<div>
    <label> Current </label>
     <input type="text" class='form-control mb-2 <?php echo $class; ?>' 
            id = "currentval"
            data-field="current" 
            data-table = "the_values"
            data-keyid_fld = "valuesid"
            value="<?php echo $current; ?>"
            data-dbid="<?php echo $dbid; ?>"/> 
</div>

<?php 
    if (count($collection) == 0) {
        echo "<button class='px-8 py-2.5 bg-blue-600 text-white rounded-lg font-semibold shadow-lg shadow-blue-200 hover:bg-blue-700 transition-all transform active:scale-95 savenewvalue'> Save </button>";
    }
?>