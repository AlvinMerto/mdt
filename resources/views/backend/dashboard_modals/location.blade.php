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
            <div class="mb-10 fv-row row">
                <div class="col-md-3">
                    <!--begin::Label-->
                    <label class="required form-label">Location name</label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
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
                </div>
                <!--end::Description-->
            </div>
            <div class="mb-10 fv-row row">
                <div class="col-md-3">
                    <!--begin::Label-->
                    <label class="required form-label">Exact Address</label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
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
            </div>
            <div class="mb-10 fv-row row">
                <div class="col-md-3">
                    <!--begin::Label-->
                    <label class="required form-label">Barangay</label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
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
            </div>
            <div class="mb-10 fv-row row">
                <div class="col-md-3">
                    <!--begin::Label-->
                    <label class="required form-label">City/Municipality</label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
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
            </div>
            <div class="mb-10 fv-row row">
                <div class="col-md-3">
                    <!--begin::Label-->
                    <label class="required form-label">Province</label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
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
            </div>
            <div class="mb-10 fv-row row">
                <div class="col-md-3">
                    <!--begin::Label-->
                    <label class="required form-label">Region</label>
                    <!--end::Label-->
                </div>
                <div class="col-md-9">
                    <!--begin::Input-->
                    <?php if (count($collection) > 0) { ?>
                        <select class="form-control mb-2 fieldtext"
                            data-field="region"
                            data-table="geolocation"
                            data-keyid_fld="geolocationid"
                            data-dbid="<?php echo $collection[0]->geolocationid; ?> ">
                            <option> -- Select </option>
                            <option value='9' <?php if ($collection[0]->region == "9") {
                                                    echo "selected";
                                                } ?>> Region 9 </option>
                            <option value='10' <?php if ($collection[0]->region == "10") {
                                                    echo "selected";
                                                } ?>> Region 10 </option>
                            <option value='11' <?php if ($collection[0]->region == "11") {
                                                    echo "selected";
                                                } ?>> Region 11 </option>
                            <option value='12' <?php if ($collection[0]->region == "12") {
                                                    echo "selected";
                                                } ?>> Region 12 </option>
                            <option value='13' <?php if ($collection[0]->region == "13") {
                                                    echo "selected";
                                                } ?>> Region 13 </option>
                            <option value='barmm' <?php if ($collection[0]->region == "barmm") {
                                                        echo "selected";
                                                    } ?>> Region Barmm </option>
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
                    <!-- <?php //if (count($collection) > 0) { 
                            ?>
                        <input type="text" name="locationname" id="regiontxtbox"
                            class="form-control mb-2 fieldtext"
                            data-field="region"
                            data-table="geolocation"
                            data-keyid_fld="geolocationid"
                            data-dbid="<?php // echo $collection[0]->geolocationid; 
                                        ?>"
                            value="<?php //echo $collection[0]->region; 
                                    ?>" />
                    <?php //} else { 
                    ?>
                        <input type="text" class="form-control mb-2" name="region" />
                    <? // php } 
                    ?> -->

                    <!--end::Input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7"></div>
                    <!--end::Description-->
                </div>
            </div>
            <!--end::Input group-->
            <div class="mb-5 row">
                <div class="col-md-3">
                    <label class="required form-label">Type of Object</label>
                </div>
                <div class="col-md-9">
                    <select name="obj" class="form-control select" id="polytype">
                        <option> -- Select </option>
                        <option value="point"> Point </option>
                        <option value="line"> Line </option>
                    </select>
                </div>
            </div>

            <div class="d-flex flex gap-3 mt-10">
                <!--begin::Input group-->
                <div class="mb-5">
                    <!--begin::Label-->
                    <label class="required form-label" id="geoname">Latitude</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <?php if (count($collection) > 0) { ?>
                        <input type="text" name="latitude" id='final_lat'
                            class="form-control mb-2 fieldtext"
                            data-field="lat"
                            data-table="geolocation"
                            data-keyid_fld="geolocationid"
                            data-dbid="<?php echo $collection[0]->geolocationid; ?> "
                            value="<?php echo $collection[0]->lat; ?>" />
                    <?php } else { ?>
                        <input type="text" name="lat" class="form-control mb-2" id='final_lat'/>
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
                        <input type="text" name="longitude" id='final_lng'
                            class="form-control mb-2 fieldtext"
                            data-field="lng"
                            data-table="geolocation"
                            data-keyid_fld="geolocationid"
                            data-dbid="<?php echo $collection[0]->geolocationid; ?> "
                            value="<?php echo $collection[0]->lng; ?>" />
                    <?php } else { ?>
                        <input type="text" class="form-control mb-2" name="lng" id='final_lng'/>
                    <?php } ?>
                    <!--end::Input-->
                </div>
                <div class="mb-5">
                    <label class="form-label">Select Location</label> <br />
                    <a class='btn btn-light' data-bs-toggle="modal" data-bs-target="#addmapmodal"> Open Map </a>
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

<div class="modal fade" id="addmapmodal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header justify-content-end border-0 pb-0">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <h1 class="mb-3">Pick the location</h1>
                </div>
                <!--end::Heading-->
                <!--begin::Plans-->
                <div class="d-flex flex-column">
                    <!--begin::Row-->
                    <script>
                        mapboxgl.accessToken = 'pk.eyJ1IjoiYWx2aW5tZXJ0byIsImEiOiJjazM3MjBobDEwN3ZvM21wemx6aG5tNHlqIn0.ch2yPYUkeOn1ih6nbfAm1A';

                        // mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5 :: dark
                        // mapbox://styles/alvinmerto/cm9cboss5008701rcdieh4wec :: light
                        const map = new mapboxgl.Map({
                            container: 'map',
                            style: 'mapbox://styles/alvinmerto/cm9cboss5008701rcdieh4wec',
                            // style: 'mapbox://styles/alvinmerto/cm9cc7hf6007q01sp0cq40gb5',
                            center: [125.15492481273519, 7.712736869468826],
                            zoom: 7
                        });

                        var mark_er = [];
                        map.on('click', function(e) {
                            removemark_er();

                            const lng = e.lngLat.lng;
                            const lat = e.lngLat.lat;

                            $(document).find("#thelatlat").val(lat);
                            $(document).find("#thelnglng").val(lng);

                            // Optional: Add a marker at the clicked location
                            const m = new mapboxgl.Marker()
                                .setLngLat([lng, lat])
                                .addTo(map);

                            mark_er.push(m);
                        });

                        $(document).on("click","#confirm_location", function() {
                            var latlat = $(document).find("#thelatlat").val();
                            var lnglng = $(document).find("#thelnglng").val();

                            $(document).find("#final_lat").val(latlat).blur();
                            $(document).find("#final_lng").val(lnglng).blur();

                            $('#addmapmodal').modal('hide');
                        });

                        function removemark_er() {
                            if (mark_er.length > 0) {
                                mark_er.forEach(mark_er => mark_er.remove());
                                mark_er = []; // clear the array
                            }
                        }
                    </script>
                    <div class="row mt-10">
                        <div class="col-md-6">
                            <div id="map"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex">
                                <div class="mb-5">
                                    <label class="required form-label">Latitude</label>
                                    <input type="text" id="thelatlat" class="form-control mb-2 fieldtext">
                                </div>
                                <div class="mb-5">
                                    <label class="required form-label">Longitude</label>
                                    <input type="text" id="thelnglng" class="form-control mb-2 fieldtext">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="mb-5">
                                    <button class='btn btn-primary' id="confirm_location"> Confirm </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Plans-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

<style>
    #map {
        /* width: 100vw; height: 100vh; */
        width: 100%;
        height: 320px;
    }
</style>