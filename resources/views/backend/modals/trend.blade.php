<div class="yeardiv">
    <h6 class='mb-5'> Year Trend </h6>
    <div class='d-flex gap-1 yearclickdiv'>
        <div style='flex:1;'>
            <ul class="d-flex gap-3" id="yearselect">
                <?php if (count($collection) > 0) { ?>
                    <?php for($i=$collection[0]->yearstart;$i<=$collection[0]->yearend;$i++) { ?>
                        <li> <?php echo $i; ?> </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
        <div style="flex:0;">
            <i class="bi bi-play-circle-fill" id='play_rbme' style="font-size: 30px;color: green;"></i>
        </div>
    </div>

    <div>
        <ul class="ruby-flex" id="thelines">
                <?php if (count($collection) > 0) {
                        $bypass = false;
                    ?>
                    <?php for($i=$collection[0]->yearstart;$i<=$collection[0]->yearend;$i++) { ?>
                        <?php foreach($yearval as $yv) { ?>
                            <?php if ($yv->theyear == $i) { ?>
                                <li style="height:<?php echo $yv->current; ?>px;" class='thewidth thecolor'> </li>
                            <?php $bypass = true; break; } ?>
                        <?php } ?>
                        <?php if ($bypass == false) { ?>
                            <li style="height:1px;" class='thewidth thecolor'> </li>
                        <?php } $bypass = false; ?>
                    <?php } ?>
                <?php } ?>
        </ul>
    </div>
</div>