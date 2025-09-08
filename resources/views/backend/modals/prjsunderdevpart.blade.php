<?php if (count($projects) > 0) { ?>
    <td colspan='10'>
        <h6 style="margin: 5px 0px 18px; padding-left: 10px;"> List of Programs / Projects </h6>
        <ul>
            <?php foreach ($projects as $p) { ?>
                <!-- <tr class="odd"> -->
                <li class='d-flex'> 
                    <i class="ki-outline ki-right-square fs-6 text-gray-600 me-2 mt-1"> </i> 
                    <a href="{{url('tracker/dashboard/mpap/edit')}}/<?php echo $p->masterid; ?>" class="text-dark text-hover-primary"><?php echo strtolower($p->title); ?></a> 
                </li>
                <!-- </tr> -->
            <?php } ?>
        </ul>
    </td>
<?php } else { ?>
    <!-- <tr> -->
    <td colspan="10"> No entry found </td>
    <!-- </tr> -->
<?php } ?>