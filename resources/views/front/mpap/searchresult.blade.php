<table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer thesearchresults">
        <thead>
            <tr>
                <th> Name </th>
                <th> Description </th>
                <th> Location </th>
                <th style="width: 20%;"> Timeline </th>
            </tr>
        </thead>
        <tbody class="fw-bold text-gray-600">
            <?php 
                $width = [
                    "on-going" => "50%",
                    "completed" => "100%",
                    "pipeline"  => "10%",
                    "on-hold"   => "30%"
                ];

                $success = [
                    "on-going" => "bg-info",
                    "completed" => "bg-success",
                    "pipeline"  => "bg-primary",
                    "on-hold"   => "bg-warning"
                ];

                $light = [
                    "on-going"  => "bg-light-info",
                    "completed" => "bg-light-success",
                    "pipeline"  => "bg-light-primary",
                    "on-hold"   => "bg-light-warning"
                ];

                if (count($collection) > 0) {
                    $preparing = null;
                   
                    foreach($collection as $c) {
                         $display   = true;
                        if ($preparing == null) {
                            $preparing = $c->masterid;
                        } else {
                            if ($preparing == $c->masterid) {
                                // continue;
                                $display = false;
                            }
                            $preparing = $c->masterid;
                        }
                        echo "<tr >";
                            echo "<td class='text-start'> ";
                                if ($display) {
                                    echo $c->title;
                                } 
                            echo "</td>";
                            echo "<td class='text-start'>";
                                if ($display) {
                                    echo $c->description;
                                } 
                            echo "</td>";
                            echo "<td class='text-start'>";
                                echo $c->columnplace;
                            echo "</td>";
                            echo "<td>
                                    <div class='d-flex align-items-center w-100 mw-125px'>
                                        <div class='progress h-6px w-100 me-2 ".$light[$c->status]."'>
                                            <div class='progress-bar ".$success[$c->status]."' role='progressbar' style='width: ".$width[$c->status]."' aria-valuenow=title'65' aria-valuemin='0' aria-valuemax='100'></div>
                                        </div>
                                    </div>
                                    <span class='text-gray-400 fw-semibold'>{$c->status}</span>
                                </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr> <td colspan='10'> No result found </td> </tr>";
                }
            ?> 
        </tbody>
    </table>