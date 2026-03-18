
    <td colspan='10'>
        <ul class="nav flex gap-5 font-weight-normal small_tab_select">
            <li class='<?php if ($level == 1) { echo "bold-selected"; } ?>' data-level = '1'> Program Level </li>
            <li class='<?php if ($level == 2) { echo "bold-selected"; } ?>' data-level = '2'> Project Level </li>
            <li class='<?php if ($level == 3) { echo "bold-selected"; } ?>' data-level = '3'> Sub-Project Level </li>
        </ul>
        <?php if (count($projects) > 0) { ?>
        <!-- <h6 style="margin: 5px 0px 18px; padding-left: 10px;"> List of Programs / Projects </h6> -->
        <ul class="font-weight-normal">
            <?php foreach ($projects as $p) { ?>
                <!-- <tr class="odd"> -->
                <li class='d-flex'> 
                    <i class="ki-duotone ki-right fs-6 text-gray-600 me-2 mt-1"> </i> 
                    <a href="{{url('tracker/dashboard/mpap/edit')}}/<?php echo $p->masterid; ?>" class="text-dark text-hover-primary"><?php echo strtolower($p->title); ?></a> 
                </li>
                <!-- </tr> -->
            <?php } ?>
        </ul>
        <?php } else { ?>
            <p> No Entry Found </p>
        <?php } ?>
    </td>

    <!-- <tr> -->
    <!-- <td colspan="10"> No entry found </td> -->
    <!-- </tr> -->
