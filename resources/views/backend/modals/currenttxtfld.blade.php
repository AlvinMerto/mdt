<?php 
    $current = null;
    $dbid    = null;
    $class   = "fieldtext_new";

    if (count($collection) > 0) {
        $current = $collection[0]->current;
        $dbid    = $collection[0]->valuesid;
        $class   = "fieldtext";
    }
?>

 <input type="text" class='form-control mb-2 <?php echo $class; ?>' 
        data-field="current" 
        data-table = "the_values"
        data-keyid_fld = "valuesid"
        value="<?php echo $current; ?>"
        data-dbid="<?php echo $dbid; ?>"/> 
<?php 
    if (count($collection) == 0) {
        echo "<button class='btn btn-primary btn-sm savenewvalue'> Save </button>";
    }
?>