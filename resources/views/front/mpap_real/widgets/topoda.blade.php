<?php 
    if (count($tops) > 0) {
    foreach($tops as $ts) {
?>

<li class='row'>
    <?php $logo  = "images/icons/{$ts->logo}.png"; ?>
    <div class="col-md-3">
        <img src="<?php echo asset($logo); ?>" style="height: 20px;margin-right: 14px;" />
    </div>
    <div class="col-md-9">
        <h5 class='showprojs' data-devpart=<?php echo $ts->id; ?>><?php echo $ts->devpartner; ?></h5>
        <p> <?php echo $ts->prjcnt; ?> projects in <?php echo $ts->location_count; ?> locations </p>
    </div>
</li>

<?php 
        }
    }
?>