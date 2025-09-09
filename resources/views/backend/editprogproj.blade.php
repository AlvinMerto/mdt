@include('backend.header')
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
	data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
	data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
	data-kt-app-sidebar-push-footer="true" class="app-default">
	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<!--begin::Header-->

			<!--end::Header-->

			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
				@include('front.mainnavs',['navigation'=>'mindaconnect'])
				<!--begin::Main-->
				<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
					<!--begin::Content wrapper-->
					<div class="d-flex flex-column flex-column-fluid">
						<!--begin::Toolbar-->
						<div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
							<!--begin::Toolbar container-->
							<div id="kt_app_toolbar_container"
								class="app-container container-fluid d-flex align-items-stretch">
								<!--begin::Toolbar wrapper-->
								<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
											Editing Project
										</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="{{route('dashboard')}}" class="text-muted text-hover-primary">HOME</a>
											</li>
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-400 w-5px h-2px"></span>
											</li>
											<li class="breadcrumb-item text-muted">
												<a href="{{route('mpapbackend')}}" class="text-muted text-hover-primary">MPAP</a>
											</li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<div class="card-toolbar" style="display:block;">
										<a href="{{route('mpapadd')}}" class="btn btn-primary btn-sm">Add Project</a>
									</div>
									<!--end::Page title-->
								</div>
								<!--end::Toolbar wrapper-->
							</div>
							<!--end::Toolbar container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Content-->
						<div id="kt_app_content" class="app-content flex-column-fluid">
							<!--begin::Content container-->
							<div id="kt_app_content_container" class="app-container container-fluid">
							@include('backend.topbar')
								<div class="card mb-5">
									<div class="card-body pt-9 pb-0">
										<!--begin::Details-->
										<div class="d-flex flex-wrap flex-sm-nowrap mb-6">
											<!--begin::Image-->
											<div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
												<img class="mw-50px mw-lg-75px" src="assets/media/svg/brand-logos/volicity-9.svg" alt="image">
											</div>
											<!--end::Image-->
											<!--begin::Wrapper-->
											<div class="flex-grow-1">
												<!--begin::Head-->
												<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
													<!--begin::Details-->
													<div class="d-flex flex-column">
														<!--begin::Status-->
														<div class="d-flex align-items-center mb-1">
															<h4> <?php echo $collection[0]->title; ?> </h4>
															<span class="badge badge-light-success me-auto"> <?php echo $collection[0]->status; ?> </span>
														</div>
														<!--end::Status-->
														<!--begin::Description-->
														<div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">
															<?php echo $collection[0]->description; ?>
														</div>
														<!--end::Description-->
													</div>
													<!--end::Details-->
												</div>
												<!--end::Head-->
												<!--begin::Info-->
												<div class="d-flex flex-wrap justify-content-start">
													<!--begin::Stats-->
													<div class="d-flex flex-wrap">
														<!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<div class="fs-4 fw-bold"> <?php echo date("F d, Y", strtotime($collection[0]->updated_at)); ?> </div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-6 text-gray-400">Last Update</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
														<!--begin::Stat-->
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<!--begin::Number-->
															<div class="d-flex align-items-center">
																<div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75" data-kt-initialized="1"><?php echo count($geo_finance); ?></div>
															</div>
															<!--end::Number-->
															<!--begin::Label-->
															<div class="fw-semibold fs-6 text-gray-400">Locations</div>
															<!--end::Label-->
														</div>
														<!--end::Stat-->
														<!--begin::Stat-->
														<!-- <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
																<div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="15000" data-kt-countup-prefix="$" data-kt-initialized="1">$15,000</div>
															</div>
															<div class="fw-semibold fs-6 text-gray-400">Budget Spent</div>
														</div> -->
														<!--end::Stat-->
													</div>
													<!--end::Stats-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Details-->
										<div class="separator"></div>
										<!--begin::Nav-->
										<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
													href="#kt_ecommerce_add_product_general">General</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
													href="#location_tabs">Location</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
													href="#financial_tabs">Financial</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
													href="#project_management_tab">Project Management</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
													href="#thrust_div_panel">Thrust</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
													href="#contacts_div">Contacts</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
													href="#additional_info">Additional Information</a>
											</li>
											<!--end:::Tab item-->
										</ul>
										<!--end::Nav-->
									</div>
								</div>
								<!--begin::Form-->
								<!--begin::Main column-->
								<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
									<!--begin::Tab content-->
									<div class="tab-content">
										<!--begin::Tab pane-->
										<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
											role="tab-panel">
											<div class="d-flex flex-column gap-7 gap-lg-10">
												<!--begin::General options-->
												<div class="card card-flush py-4">
													<!--begin::Card header-->
													<div class="card-header">
														<div class="card-title">
															<h2>General</h2>
														</div>
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0">
														<div class="d-flex flex-wrap gap-5">
															<!--begin::Status-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">Status</label>
																<!--end::Label-->
																<!--begin::Input-->
																<?php if (count($collection) > 0) { ?>
																	<div class="">
																		<!--begin::Select2-->
																		<?php $status = $collection[0]->pluck("status")->unique(); ?>
																		<select class="form-control mb-2 fieldtext"
																			data-field="status"
																			data-table="master__data"
																			data-keyid_fld="masterid"
																			data-dbid="<?php echo $collection[0]->masterid; ?> ">
																			<option> -- Select </option>
																			<option value='pipeline' <?php if ($collection[0]->status == "pipeline") {
																											echo "selected";
																										} ?>> Pipeline </option>
																			<option value='on-going' <?php if ($collection[0]->status == "on-going") {
																											echo "selected";
																										} ?>> On-Going </option>
																			<option value='completed' <?php if ($collection[0]->status == "completed") {
																											echo "selected";
																										} ?>> Completed </option>
																			<option value='on-hold' <?php if ($collection[0]->status == "on-hold") {
																										echo "selected";
																									} ?>> On-Hold </option>
																		<?php } ?>
																		</select>
																		<!--end::Select2-->
																		<!--begin::Description-->
																		<div class="text-muted fs-7">Set the status.</div>
																		<!--end::Description-->
																	</div>
																	<!--end::Input-->
															</div>
															<!--end::Status-->
															<!--begin::Input group-->
															<div class="mb-10 fv-row">
																<!--begin::Label-->
																<label class="required form-label">Development
																	Partner</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select class="form-control mb-2 fieldtext"
																	data-field="development_partner"
																	data-table="master__data"
																	data-keyid_fld="masterid"
																	data-dbid="<?php echo $collection[0]->masterid; ?> ">
																	<option> -- Select </option>
																	<?php
																	if (count($devparts) > 0) {
																		foreach ($devparts as $devpart) {
																			$selected = null;

																			if ($devpart->id == $collection[0]->development_partner) {
																				$selected = "selected";
																			}

																			echo "<option value='{$devpart->id}' {$selected}>" . $devpart->devpartner . "</option>";
																		}
																	}
																	?>
																</select>
																<!--end::Input-->
																<!--begin::Description-->
																<!-- <div class="text-muted fs-7">Click here if you want to
																	add a <a href="#"> development partner </a></div> -->
																<!--end::Description-->
															</div>
															<!--end::Input group-->
														</div>
														<!--begin::Input group-->
														<div class="mb-10 fv-row">
															<!--begin::Label-->
															<label class="required form-label">Title</label>
															<!--end::Label-->
															<!--begin::Input-->
															<input type='text' class="form-control mb-2 fieldtext"
																data-field="title" data-table="master__data"
																data-keyid_fld="masterid"
																data-dbid="<?php echo $collection[0]->masterid; ?> "
																value="<?php echo $collection[0]->title; ?>" />
															<!--end::Input-->
															<!--begin::Description-->
															<div class="text-muted fs-7">A title is required and
																recommended to be unique.</div>
															<!--end::Description-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="mb-10 ">
															<!--begin::Label-->
															<label class="form-label">Description</label>
															<!--end::Label-->
															<!--begin::Editor-->
															<textarea
																class="form-control mb-2 textareatxt fieldtext"
																data-field="description" data-table="master__data"
																data-keyid_fld="masterid"
																data-dbid="<?php echo $collection[0]->masterid; ?> "><?php echo $collection[0]->description; ?></textarea>
															<!--end::Editor-->
															<!--begin::Description-->
															<div class="text-muted fs-7">Set a description to the
																title</div>
															<!--end::Description-->
														</div>
														<!--end::Input group-->
														<div class="d-flex flex-wrap gap-5">
															<!--end::Input group-->
															<div class="fv-row w-100 flex-md-root fv-plugins-icon-container mb-10">
																<!--begin::Label-->
																<label class="form-label">Type of Financing</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<select class="form-control mb-2 fieldtext"
																	data-field="type_of_financing"
																	data-table="master__data"
																	data-keyid_fld="masterid"
																	data-dbid="<?php echo $collection[0]->masterid; ?> ">
																	<option> -- Select </option>
																	<option <?php if ($collection[0]->type_of_financing == "loan") {
																				echo "selected";
																			} ?> value="loan"> Loan </option>
																	<option <?php if ($collection[0]->type_of_financing == "grant") {
																				echo "selected";
																			} ?> value="grant"> Grant </option>
																</select>
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Click here to add more <a
																		href="#"> type of financing </a> </div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--end::Input group-->
															<div class="fv-row w-100 flex-md-root fv-plugins-icon-container mb-10">
																<!--begin::Label-->
																<label class="form-label">Sub Type of financing</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<select class="form-control mb-2 fieldtext"
																	data-field="sub_type"
																	data-table="master__data"
																	data-keyid_fld="masterid"
																	data-dbid="<?php echo $collection[0]->masterid; ?> ">
																	<option value=""> -- Select </option>
																	<?php
																	if (count($sub_financing) > 0) {
																		foreach ($sub_financing as $sf) {
																			$selected = null;

																			if ($sf->subfinanceid == $collection[0]->sub_type) {
																				$selected = "selected";
																			}
																			echo "<option value='{$sf->subfinanceid}' {$selected}> {$sf->subfinance} </option>";
																		}
																	}
																	?>
																</select>
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">click here to add more <a
																		href="#">sub-type</a></div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
														</div>
														<div class="d-flex flex-wrap gap-5">
															<!--begin::Input group-->
															<div class="fv-row w-100 flex-md-root fv-plugins-icon-container mb-10 ">
																<!--begin::Label-->
																<label class="form-label">Sector</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<select class="form-control mb-2 fieldtext"
																	data-field="sector"
																	data-table="master__data"
																	data-keyid_fld="masterid"
																	data-dbid="<?php echo $collection[0]->masterid; ?> ">
																	<option value=""> -- Select </option>
																	<?php
																	if (count($sector) > 0) {
																		foreach ($sector as $s) {
																			$selected = null;
																			if ($s->sectorid == $collection[0]->sector) {
																				$selected = "selected";
																			}
																			echo "<option value='{$s->sectorid}' {$selected}> {$s->thesector} </option>";
																		}
																	}
																	?>
																</select>
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set the sector</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row w-100 flex-md-root fv-plugins-icon-container mb-10">
																<!--begin::Label-->
																<label class="form-label">Sub-Sector</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<select class="form-control mb-2 fieldtext"
																	data-field="sub_sector"
																	data-table="master__data"
																	data-keyid_fld="masterid"
																	data-dbid="<?php echo $collection[0]->masterid; ?> ">
																	<option value=""> -- Select </option>
																	<?php
																	if (count($sub_sector) > 0) {
																		foreach ($sub_sector as $ss) {
																			$selected = null;
																			if ($ss->subsectorid == $collection[0]->sub_sector) {
																				$selected = "selected";
																			}

																			echo "<option value='{$ss->subsectorid}' {$selected}>{$ss->thesubsector}</option>";
																		}
																	}
																	?>
																</select>
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set the sub-sector</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
														</div>
														<div class="mb-10 ">
															<!--begin::Label-->
															<label class="form-label">Scope</label>
															<!--end::Label-->
															<!--begin::Editor-->
															<input type='text' class="form-control mb-2 fieldtext"
																data-field="scope" data-table="master__data"
																data-keyid_fld="masterid"
																data-dbid="<?php echo $collection[0]->masterid; ?> "
																value="<?php echo $collection[0]->scope; ?>" />
															<!--end::Editor-->
															<!--begin::Description-->
															<div class="text-muted fs-7">Set the scope of the
																project separated by comma</div>
															<!--end::Description-->
														</div>
														<!--end::Input group-->
														<div class="d-flex flex-wrap gap-5">
															<!--end::Input group-->
															<div
																class="fv-row w-100 flex-md-root fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="form-label">Project Start</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<input type='date'
																	class="form-control mb-2 fieldtext"
																	data-field="project_start"
																	data-table="master__data"
																	data-keyid_fld="masterid"
																	data-dbid="<?php echo $collection[0]->masterid; ?> "
																	value="<?php echo $collection[0]->project_start; ?>" />
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">Set the starting of the
																	project</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
															<!--end::Input group-->
															<div
																class="fv-row w-100 flex-md-root fv-plugins-icon-container">
																<!--begin::Label-->
																<label class="form-label">Project End</label>
																<!--end::Label-->
																<!--begin::Editor-->
																<input type='date'
																	class="form-control mb-2 fieldtext"
																	data-field="project_end"
																	data-table="master__data"
																	data-keyid_fld="masterid"
																	data-dbid="<?php echo $collection[0]->masterid; ?> "
																	value="<?php echo $collection[0]->project_end; ?>" />
																<!--end::Editor-->
																<!--begin::Description-->
																<div class="text-muted fs-7">set the ending date
																</div>
																<!--end::Description-->
															</div>
															<!--end::Input group-->
														</div>
													</div>
													<!--end::Card header-->
												</div>
												<!--end::General options-->
											</div>
										</div>
										<!--end::Tab pane-->
										<!--begin::Tab pane-->
										<div class="tab-pane fade" id="location_tabs" role="tab-panel">
											<div class="row">
												<div class="col-md-4 ">
													<div class="card-toolbar mb-2">
														<button type="button" id="addnewlocation" class="btn btn-sm btn-primary">
															<span class="indicator-label">Add New Location</span>
														</button>
														<label class="uploadcsvwindow">
															<span class=''> Upload a CSV </span>
															<input type="hidden" value="<?php echo $collection[0]->masterid; ?>" id="masteridhide" />
															<input class='mt-4' type="file" id="thecsvfile" name="thecsvfile" />
															<span class='mt-2' id="csvuploadStatus"> &nbsp; </span>
														</label>
													</div>
													<?php
													if (count($geo_finance) > 0) {
														echo "<ul class='ul_listing' id='gd_list'>";
														foreach ($geo_finance as $gf) {
															echo "<li data-loc_id='{$gf->geolocationid}'> {$gf->columnplace} </li>";
														}
														echo "</ul>";
													}
													?>
												</div>
												<div class="col-md-8 d-flex flex-column gap-7 gap-lg-10">
													<!--begin::Location-->
													<span id="show_location">

													</span>
													<!--end::Location-->
												</div>
											</div>
										</div>
										<!--end::Tab pane-->
										<!--begin::Tab pane-->
										<div class="tab-pane fade" id="financial_tabs" role="tab-panel">
											<div class="row">
												<?php
												if (count($geo_finance) > 0) {
													echo "<div class='col-md-4'>";
													echo "<ul class='ul_listing' id='fd_list'>";
													foreach ($geo_finance as $gf) {
														echo "<li data-loc_id='{$gf->geolocationid}'> {$gf->columnplace} </li>";
													}
													echo "</ul>";
													echo "</div>";
												}
												?>
												<div class="col-md-8 d-flex flex-column gap-7 gap-lg-10">
													<span id="fd_show">
														<div class="card card-flush py-4">
															<!--begin::Card header-->
															<div class="card-header">
																<div class="card-title">
																	<h2>Finances:</h2>
																</div>
															</div>
															<div class="card-body pt-0">
																<div class="fv-row">
																	<div class="d-flex flex-wrap flex-sm-nowrap gap-3">
																		<div class='mb-5'>
																			<label class="form-label">Project Amount</label>
																			<input type='text' id="projectamount"
																				class="form-control mb-2 fieldtext"
																				data-field="projectamount"
																				data-table="financetbls"
																				data-keyid_fld="masterid"
																				data-dbid="<?php echo $collection[0]->masterid; ?> "
																				value="<?php echo $collection[0]->projectamount; ?>" />
																			<div class="text-muted fs-7 badge badge-light-success fs-base"><?php echo number_format($collection[0]->projectamount, 2); ?></div>
																		</div>
																		<div class='mb-5'>
																			<label class="form-label">Project Amount Per Site</label>
																			<input type='text' class="form-control mb-2 fieldtext" id="amountperprojectsite" data-field="projectamountpersite"
																				data-table="financetbls" data-keyid_fld="masterid" data-dbid="<?php echo $collection[0]->masterid; ?> "
																				value="<?php echo $collection[0]->projectamountpersite; ?>" />
																			<div class="text-muted fs-7 ">It's important to enter the project cost per location. </div>
																			<div class="text-muted fs-7 badge badge-light-success fs-base mt-2"><?php echo number_format($collection[0]->projectamountpersite, 2); ?></div>
																		</div>
																	</div>
																	<div class="d-flex flex-wrap flex-sm-nowrap gap-3">
																		<label>
																			<input type="checkbox" id='computeinmil' /> Compute in Millions
																		</label>
																	</div>
																</div>
															</div>
														</div>
													</span>
												</div>
											</div>
										</div>
										<!--end::Tab pane-->
										<!--begin::Tab content-->
										<div class="tab-content">
											<!--begin::Tab pane-->
											<div class="tab-pane fade" id="project_management_tab" role="tab-panel">
												<div class="d-flex flex-column gap-7 gap-lg-10">
													<!--begin::General options-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<!--div class="card-header"-->
														<!--div class="card-title"-->
														<!--h2>General</h2-->
														<!--/div-->
														<!--/div-->
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<div class="">
																<div class="row mb-10">
																	<div class="col-md-2">
																		<!--begin::Label-->
																		<label class="form-label">Project Layer</label>
																		<!--end::Label-->
																	</div>
																	<div class="col-md-10">
																		<!--begin::Editor-->
																		<select class="form-control mb-2 fieldtext selectlevel"
																			data-field="layertype"
																			data-table="master__data"
																			data-keyid_fld="masterid"
																			data-dbid="<?php echo $collection[0]->masterid; ?> ">
																			<?php
																			$layers = ["--Select Level", "1 - Program Level", "2 - Project Level", "3 - Activity Level"];
																			?>
																			<?php
																			$count = 0;
																			foreach ($layers as $l) {
																				$selected = null;

																				if ($count == $collection[0]->layertype) {
																					$selected = "selected";
																				}

																				echo "<option value='{$count}' {$selected}>{$layers[$count]}</option>";
																				$count++;
																			}
																			?>
																		</select>
																		<!--end::Editor-->
																	</div>
																</div>

																<?php
																if ($collection[0]->layertype == 3) {
																	$show2 = null;
																	$show3 = "hideit";
																} else if ($collection[0]->layertype == 2) {
																	$show2 = "hideit";
																	$show3 = null;
																} else if ($collection[0]->layertype == 1) {
																	$show2 = "hideit";
																	$show3 = "hideit";
																} else if ($collection[0]->layertype == 0) {
																	$show2 = "hideit";
																	$show3 = "hideit";
																}
																?>

																<div class="row <?php echo $show2; ?>" id="level2_select">
																	<div class="col-md-2">
																		<!--begin::Label-->
																		<label class="form-label">Place under level 2</label>
																		<!--end::Label-->
																	</div>
																	<div class="col-md-10">
																		<!--begin::Editor-->
																		<select class="form-control mb-2 fieldtext"
																			id="level2_select"
																			data-field="attachedtolayer"
																			data-table="master__data"
																			data-keyid_fld="masterid"
																			data-dbid="<?php echo $collection[0]->masterid; ?> ">
																			<?php foreach ($allmasterdata as $c) {
																				$selected = null;
																			?>
																				<?php if ($c->layertype == 2) { ?>
																					<?php if ($collection[0]->attachedtolayer == $c->masterid) {
																						$selected = "selected";
																					} ?>
																					<option value="<?php echo $c->masterid; ?>" <?php echo $selected; ?>> <?php echo $c->title; ?> </option>
																				<?php } ?>
																			<?php } ?>
																		</select>
																		<!--end::Editor-->
																	</div>
																</div>

																<div class="row <?php echo $show3; ?>" id="level1_select">
																	<div class="col-md-2">
																		<!--begin::Label-->
																		<label class="form-label">Place under level 1</label>
																		<!--end::Label-->
																	</div>
																	<div class="col-md-10">
																		<!--begin::Editor-->
																		<select class="form-control mb-2 fieldtext"
																			id="level1_select"
																			data-field="attachedtolayer"
																			data-table="master__data"
																			data-keyid_fld="masterid"
																			data-dbid="<?php echo $collection[0]->masterid; ?> ">
																			<?php foreach ($allmasterdata as $c) {
																				$selected = null;
																			?>
																				<?php if ($c->layertype == 1) { ?>
																					<?php if ($collection[0]->attachedtolayer == $c->masterid) {
																						$selected = "selected";
																					} ?>
																					<option value="<?php echo $c->masterid; ?>" <?php echo $selected; ?>> <?php echo $c->title; ?> </option>
																				<?php } ?>
																			<?php } ?>
																		</select>
																		<!--end::Editor-->
																	</div>
																</div>
															</div>
															<hr style="border: 0px;border-bottom: 1px solid #ccc;margin: 20px 0px;" />
															<div class="row mb-10">
																<!--start::Input group-->
																<div class="col-md-2">
																	<!--begin::Label-->
																	<label class="form-label">Lead Agency </label>
																	<!--end::Label-->
																</div>
																<div class="col-md-10">
																	<!--begin::Editor-->
																	<input type='text'
																		class="form-control mb-2 fieldtext"
																		data-field="leadagency"
																		data-table="implementingtbls"
																		data-keyid_fld="impid"
																		data-dbid="<?php echo $implimentingps[0]->impid; ?> "
																		value="<?php echo $implimentingps[0]->leadagency; ?>" />
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">The agency leading the implimentation of the project</div>
																	<!--end::Description-->
																</div>
															</div>
															<div class="row mb-10">
																<!--end::Input group-->
																<!--start::Input group-->
																<div class="col-md-2">
																	<!--begin::Label-->
																	<label class="form-label"> Agency's Scope </label>
																	<!--end::Label-->
																</div>
																<div class="col-md-10">
																	<!--begin::Editor-->
																	<input type='text'
																		class="form-control mb-2 fieldtext"
																		data-field="region_national"
																		data-table="implementingtbls"
																		data-keyid_fld="impid"
																		data-dbid="<?php echo $implimentingps[0]->impid; ?> "
																		value="<?php echo $implimentingps[0]->region_national; ?>" />
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7"> Add the region(s) of the lead agency (separated in commas) </div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
															</div>
															<div class="row">
																<!--start::Input group-->
																<div class="col-md-2">
																	<!--begin::Label-->
																	<label class="form-label">Other Partner Agency </label>
																	<!--end::Label-->
																</div>
																<div class="col-md-10">
																	<!--begin::Editor-->
																	<input type='text'
																		class="form-control mb-2 fieldtext"
																		data-field="otherpartneragency"
																		data-table="implementingtbls"
																		data-keyid_fld="impid"
																		data-dbid="<?php echo $implimentingps[0]->impid; ?> "
																		value="<?php echo $implimentingps[0]->otherpartneragency; ?>" />
																	<!--end::Editor-->
																	<!--begin::Description-->

																	<!--end::Description-->
																</div>
																<!--end::Input group-->
															</div>
															<!--end::Card body-->
														</div>
														<!--end::Card-->
													</div>
												</div>
											</div>
											<!--end::tab-->
											<!--begin::Tab pane-->
											<div class="tab-pane fade" id="thrust_div_panel" role="tab-panel">
												<div class="d-flex flex-column gap-7 gap-lg-10">
													<!--begin::thrust-->
													<div class="card card-flush py-4">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Thrust</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!-- begin::fv-row -->
															<div class="fv-row">
																<div class="d-flex flex-wrap flex-sm-nowrap gap-10">
																	<div class='mb-5'>
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">Mindanao
																			Agenda</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<select class="form-control mb-2 fieldtext"
																			data-field="agendaid"
																			data-table="master__data"
																			data-keyid_fld="masterid"
																			data-dbid="<?php echo $collection[0]->masterid; ?> ">
																			<?php
																			if (count($ma) > 0) {
																				foreach ($ma as $m) {
																					$selected = null;
																					if ($m->agendaid == $collection[0]->ma_thrust) {
																						$selected = "selected";
																					}
																					echo "<option value='{$m->agendaid}' {$selected}> {$m->agendatitle} : {$m->agendaname} </option>";
																				}
																			}
																			?>
																		</select>
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																	<div class='mb-5'>
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">Alignment with the
																			SDG</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<?php
																		$sdg = [
																			"SDG 1: No poverty",
																			"SDG 2: Zero Hunger",
																			"SDG 3: Good Health and Well-being",
																			"SDG 4: Quality Education",
																			"SDG 5: Gender Equality",
																			"SDG 6: Clean Water and sanitation",
																			"SDG 7: Affordable and clean energy",
																			"SDG 8: Decent work and economic growth",
																			"SDG 9: Industry Innovation and infrastructure",
																			"SDG 10: Reduced Inequalities",
																			"SDG 11: Sustainable Cities and communities",
																			"SDG 12: Responsible Consumption and Production",
																			"SDG 13: Climate Change",
																			"SDG 14: Life Below Water",
																			"SDG 15: Life on Land",
																			"SDG 16: Peace Justice and strong institutions",
																			"SDG 17: Partnerships for the goals"
																		];
																		?>
																		<select class="form-control mb-2 fieldtext"
																			data-field="sdg_thrust"
																			data-table="master__data"
																			data-keyid_fld="masterid"
																			data-dbid="<?php echo $collection[0]->masterid; ?> ">
																			<?php
																			$sdg_count = 1;
																			foreach ($sdg as $s) {
																				$selected = null;

																				if ($collection[0]->sdg_thrust == $sdg_count) {
																					$selected = "selected";
																				}

																				$sc = $sdg_count - 1;
																				echo "<option value='{$sdg_count}'> {$sdg[$sc]} </option>";
																				$sdg_count++;
																			}
																			?>
																		</select>
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="card card-flush py-4" style="display:none;">
														<!--begin::Card header-->
														<div class="card-header">
															<div class="card-title">
																<h2>Alignment</h2>
															</div>
														</div>
														<!--end::Card header-->
														<!--begin::Card body-->
														<div class="card-body pt-0">
															<!-- begin::fv-row -->
															<div class="fv-row">
																<div class="d-flex flex-wrap flex-sm-nowrap gap-10">
																	<div class='mb-5'>
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">Disaster and Risk
																			Reduction</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<select class="form-select mb-2">
																			<option value="pipeline"
																				selected="selected">Yes</option>
																			<option value="completed">No</option>
																		</select>
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																	<div class='mb-5'>
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">Women</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<select class="form-select mb-2">
																			<option value="pipeline"
																				selected="selected">Yes</option>
																			<option value="completed">No</option>
																		</select>
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																	<div class='mb-5'>
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">PWDs</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<select class="form-select mb-2">
																			<option value="pipeline"
																				selected="selected">Yes</option>
																			<option value="completed">No</option>
																		</select>
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																	<div class='mb-0'>
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">IPs</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<select class="form-select mb-2">
																			<option value="pipeline"
																				selected="selected">Yes</option>
																			<option value="completed">No</option>
																		</select>
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!--end::Tab pane-->
											<!--begin::Tab pane-->
											<div class="tab-pane fade" id="contacts_div" role="tab-panel">
												<!--begin::General options-->
												<div class="card card-flush py-4">
													<!--begin::Card header-->
													<div class="card-header">
														<div class="card-title">
															<h2>Contacts</h2>
														</div>
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0">
														<div class="fv-row">
															<div
																class="d-flex flex-wrap flex-sm-nowrap gap-10 mb-10">
																<div
																	class='fv-row w-100 flex-md-root fv-plugins-icon-container'>
																	<div class="mb-5">
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">Lead Name</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<input type='text'
																			class="form-control mb-2 fieldtext"
																			data-field="leadname"
																			data-table="contacttbls"
																			data-keyid_fld="contactid"
																			data-dbid="<?php echo $contacts[0]->contactid; ?> "
																			value="<?php echo $contacts[0]->leadname; ?>" />
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																	<div class="mb-5">
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">Contact
																			Number</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<input type='text'
																			class="form-control mb-2 fieldtext"
																			data-field="contactinfo_lead"
																			data-table="contacttbls"
																			data-keyid_fld="contactid"
																			data-dbid="<?php echo $contacts[0]->contactid; ?> "
																			value="<?php echo $contacts[0]->contactinfo_lead; ?>" />
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																</div>
																<div
																	class='fv-row w-100 flex-md-root fv-plugins-icon-container'>
																	<div class="mb-5">
																		<!--begin::Input group-->
																		<!--begin::Label-->
																		<label class="form-label">Office
																			Address</label>
																		<!--end::Label-->
																		<!--begin::Select2-->
																		<textarea
																			class="form-control mb-2 textareatxt fieldtext"
																			data-field="officeaddr"
																			data-table="contacttbls"
																			data-keyid_fld="contactid"
																			data-dbid="<?php echo $contacts[0]->contactid; ?>"><?php echo $contacts[0]->officeaddr; ?></textarea>
																		<!--end::Select2-->
																		<!--end::Input group-->
																	</div>
																</div>
															</div>
															<div>
																<div class="mb-5">
																	<!--begin::Input group-->
																	<!--begin::Label-->
																	<label class="form-label">M and E Lead</label>
																	<!--end::Label-->
																	<!--begin::Select2-->
																	<input type='text'
																		class="form-control mb-2 fieldtext"
																		data-field="m_e_chiefname"
																		data-table="contacttbls"
																		data-keyid_fld="contactid"
																		data-dbid="<?php echo $contacts[0]->contactid; ?> "
																		value="<?php echo $contacts[0]->m_e_chiefname; ?>" />
																	<!--end::Select2-->
																	<!--end::Input group-->
																</div>
																<div class="mb-5">
																	<!--begin::Input group-->
																	<!--begin::Label-->
																	<label class="form-label">Contact Number</label>
																	<!--end::Label-->
																	<!--begin::Select2-->
																	<input type='text'
																		class="form-control mb-2 fieldtext"
																		data-field="contactinfo_me"
																		data-table="contacttbls"
																		data-keyid_fld="contactid"
																		data-dbid="<?php echo $contacts[0]->contactid; ?> "
																		value="<?php echo $contacts[0]->contactinfo_me; ?>" />
																	<!--end::Select2-->
																	<!--end::Input group-->
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- end general options -->
											</div>
											<!--end::Tab pane-->
											<!--begin::Tab pane-->
											<div class="tab-pane fade" id="additional_info" role="tab-panel">
												<!--begin::General options-->
												<div class="card card-flush py-4">
													<!--begin::Card header-->
													<div class="card-header">
														<div class="card-title">
															<h2>Additional Information</h2>
														</div>
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0">
														<div class="fv-row">
															<div class="d-flex flex-wrap flex-sm-nowrap gap-10 mb-10">
																<div class="mb-10 w-100">
																	<!--begin::Label-->
																	<label class="form-label">Update to the project</label>
																	<!--end::Label-->
																	<!--begin::Editor-->
																	<textarea class="form-control mb-2 textareatxt" id="updatetext"></textarea>
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7 mb-4">set update for people to see</div>
																	<!--end::Description-->
																	<button type="button" class="btn btn-primary btn-sm" id="provide_btnupdate" data-masterid="<?php echo $collection[0]->masterid; ?>"> Add Update </button>
																</div>
															</div>
															<div class="mb-10 w-100">
																<!--begin::Label-->
																<label class="form-label">Updates</label>
																<!--end::Label-->
																<div class="tab-pane fade active show" id="kt_list_widget_16_tab_2" role="tabpanel">
																	<!--begin::Item-->
																	<span id="showupdates"></span>
																	<!--end::Item-->
																	<!--begin::Separator-->
																	<div class="separator separator-dashed mt-5 mb-4"></div>
																	<!--end::Separator-->
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--end::general options -->
											</div>
											<!--end::tab pane -->
										</div>
										<!--end::Tab content-->

									</div>
									<!--end::Main column-->
									<!--end::Form-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						@include('backend.footcrumbs')
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->

		@include('backend.footer')