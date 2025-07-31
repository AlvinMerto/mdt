<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Location</h2>
        </div>
        <?php
        if (!$isnew) {
        ?>
            <!-- <div class="card-toolbar">
            <button type="button" id="addnewlocation" class="btn btn-sm btn-primary">
                <span class="indicator-label">Add New Location</span>
            </button>
        </div> -->
        <?php } ?>
    </div>
    <!--end::Card header-->
    <?php if ($isnew) { ?>
        <form method="post" enctype="multipart/form-data">
            @csrf
        <?php } ?>
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">Location name</label>
                <!--end::Label-->
                <!--begin::Input-->
                <?php if (count($collection) > 0) { ?>
                    <input type="text"
                        class="form-control mb-2 fieldtext"
                        data-field="columnplace"
                        data-table="geolocation"
                        data-keyid_fld="geolocationid"
                        data-dbid="<?php echo $collection[0]->geolocationid; ?> "
                        value="<?php echo $collection[0]->columnplace; ?>"
                        name="locationname" />
                <?php } else { ?>
                    <input type="text" name="columnplace" class="form-control mb-2" />
                <?php } ?>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">General name of the site location</div>
                <!--end::Description-->
            </div>
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">Exact Address</label>
                <!--end::Label-->
                <!--begin::Input-->
                <?php if (count($collection) > 0) { ?>
                    <textarea class="form-control mb-2 textareatxt fieldtext"
                        data-field="exactaddr"
                        data-table="geolocation"
                        data-keyid_fld="geolocationid"
                        data-dbid="<?php echo $collection[0]->geolocationid; ?> "><?php echo $collection[0]->exactaddr;  ?></textarea>
                <?php } else { ?>
                    <textarea class="form-control mb-2 textareatxt" name="exactaddr"></textarea>
                <?php } ?>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7"></div>
                <!--end::Description-->
            </div>
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">Barangay</label>
                <!--end::Label-->
                <!--begin::Input-->
                <?php if (count($collection) > 0) { ?>
                    <input type="text"
                        class="form-control mb-2 fieldtext"
                        data-field="brgy"
                        data-table="geolocation"
                        data-keyid_fld="geolocationid"
                        data-dbid="<?php echo $collection[0]->geolocationid; ?>"
                        value="<?php echo $collection[0]->brgy; ?>" />
                <?php } else { ?>
                    <input type="text" name="brgy" class="form-control mb-2" />
                <?php } ?>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7"></div>
                <!--end::Description-->
            </div>
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">City/Municipality</label>
                <!--end::Label-->
                <!--begin::Input-->
                <?php if (count($collection) > 0) { ?>
                    <input type="text" name="locationname"
                        class="form-control mb-2 fieldtext"
                        data-field="muni_city"
                        data-table="geolocation"
                        data-keyid_fld="geolocationid"
                        data-dbid="<?php echo $collection[0]->geolocationid; ?> "
                        value="<?php echo $collection[0]->muni_city; ?>" />
                <?php } else { ?>
                    <input type="text" name="muni_city" class="form-control mb-2" />
                <?php } ?>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7"></div>
                <!--end::Description-->
            </div>
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">Province</label>
                <!--end::Label-->
                <!--begin::Input-->
                <?php if (count($collection) > 0) { ?>
                    <input type="text" name="locationname"
                        class="form-control mb-2 fieldtext"
                        data-field="province"
                        data-table="geolocation"
                        data-keyid_fld="geolocationid"
                        data-dbid="<?php echo $collection[0]->geolocationid; ?> "
                        value="<?php echo $collection[0]->province; ?>" />
                <?php } else { ?>
                    <input type="text" name="province" class="form-control mb-2" />
                <?php } ?>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7"></div>
                <!--end::Description-->
            </div>
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="required form-label">Region</label>
                <!--end::Label-->
                <!--begin::Input-->
                <?php if (count($collection) > 0) { ?>
                    <select class="form-control mb-2 fieldtext"
                        data-field="region"
                        data-table="geolocation" 
                        data-keyid_fld="geolocationid"
                        data-dbid="<?php echo $collection[0]->geolocationid; ?> ">
                        <option> -- Select </option>
                        <option value='9' <?php if($collection[0]->region == "9") { echo "selected"; } ?>> Region 9 </option>
                        <option value='10' <?php if($collection[0]->region == "10") { echo "selected"; } ?>> Region 10 </option>
                        <option value='11' <?php if($collection[0]->region == "11") { echo "selected"; } ?>> Region 11 </option>
                        <option value='12' <?php if($collection[0]->region == "12") { echo "selected"; } ?>> Region 12 </option>
                        <option value='13' <?php if($collection[0]->region == "13") { echo "selected"; } ?>> Region 13 </option>
                        <option value='barmm' <?php if($collection[0]->region == "barmm") { echo "selected"; } ?>> Region Barmm </option>
                    </select>
                <?php } else { ?>
                    <select name="region" class="form-control mb-2">
                        <option> -- Select </option>
                        <option value='9'> Region 9 </option>
                        <option value='10'> Region 10 </option>
                        <option value='11'> Region 11 </option>
                        <option value='12'> Region 12 </option>
                        <option value='13'> Region 13 </option>
                        <option value='barmm'> Barmm </option>
                    </select>
                <?php } ?>
                <!-- <?php //if (count($collection) > 0) { ?>
                    <input type="text" name="locationname" id="regiontxtbox"
                        class="form-control mb-2 fieldtext"
                        data-field="region"
                        data-table="geolocation"
                        data-keyid_fld="geolocationid"
                        data-dbid="<?php // echo $collection[0]->geolocationid; ?>"
                        value="<?php //echo $collection[0]->region; ?>" />
                <?php //} else { ?>
                    <input type="text" class="form-control mb-2" name="region" />
                <?php//} ?> -->

                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7"></div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
            <div class="mb-5">
                 <label class="required form-label">Type of Object</label>
                <select name="obj" class="form-control select" id = "polytype">
                    <option> -- Select </option>
                    <option value="point"> Point </option>
                    <option value="line"> Line </option>
                </select>
            </div>
            <div class="d-flex flex gap-3">
                <!--begin::Input group-->
                <div class="mb-5">
                    <!--begin::Label-->
                    <label class="required form-label" id="geoname">Latitude</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <?php if (count($collection) > 0) { ?>
                        <input type="text" name="latitude"
                            class="form-control mb-2 fieldtext"
                            data-field="lat"
                            data-table="geolocation"
                            data-keyid_fld="geolocationid"
                            data-dbid="<?php echo $collection[0]->geolocationid; ?> "
                            value="<?php echo $collection[0]->lat; ?>" />
                    <?php } else { ?>
                        <input type="text" name="lat" class="form-control mb-2" />
                    <?php } ?>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="mb-5" id="longitude_div">
                    <!--begin::Label-->
                    <label class="required form-label">Longitude</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <?php if (count($collection) > 0) { ?>
                        <input type="text" name="longitude"
                            class="form-control mb-2 fieldtext"
                            data-field="lng"
                            data-table="geolocation"
                            data-keyid_fld="geolocationid"
                            data-dbid="<?php echo $collection[0]->geolocationid; ?> "
                            value="<?php echo $collection[0]->lng; ?>" />
                    <?php } else { ?>
                        <input type="text" class="form-control mb-2" name="lng" />
                    <?php } ?>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            
            <?php if ($isnew) { ?>
                <button type="submit" class="btn btn-primary" name="savenewlocation">
                    <span class="indicator-label">Save this location</span>
                </button>
        </form>
    <?php } ?>
</div>
<!--end::Card header-->
</div>