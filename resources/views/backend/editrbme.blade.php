@include('backend.header')
    	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
                
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					@include('front.mainnavs',['navigation'=>'mindaconnect'])
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
									<!--begin::Toolbar wrapper-->
									<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
										<!--begin::Page title-->
										<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
											<!--begin::Title-->
											<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Edit</h1>
											<!--end::Title-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">
													<a href="../../demo55/dist/index.html" class="text-muted text-hover-primary">Dashboard</a>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item">
													<span class="bullet bg-gray-400 w-5px h-2px"></span>
												</li>
												<!--end::Item-->
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">rbme</li>
												<!--end::Item-->
											</ul>
											<!--end::Breadcrumb-->
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
									<!--begin::Form-->
									<div id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row">
										<!--begin::Aside column-->
										<div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
											<!--begin::Thumbnail settings-->
											<div class="card card-flush py-4">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2>Logo</h2>
													</div>
													<!--end::Card title-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body text-center pt-0">
													<!--begin::Image input-->
													<div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
														<!--begin::Preview existing avatar-->
														<?php 
															$thelogo = asset("storage/images/ma_icons/".$agenda[0]->thelogo);
														?>
														<div class="image-input-wrapper w-150px h-150px" style="background-image:url('<?php echo $thelogo; ?>');"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
															<i class="ki-outline ki-pencil fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" id="fileInput" name="fileInput" accept=".png, .jpg, .jpeg" />
															<input type="hidden" id="aid" value="<?php echo $agenda[0]->agendaid; ?>" />
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="ki-outline ki-cross fs-2"></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="ki-outline ki-cross fs-2"></i>
														</span>
														<!--end::Remove-->
													</div>
													<!--end::Image input-->
													<!--begin::Description-->
													<div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
													<small id="uploadStatus"> </small>
													<!--end::Description-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Thumbnail settings-->
											<!--begin::Status-->
											<div class="card card-flush py-4">
												<!--begin::Card header-->
												<div class="card-header">
													<!--begin::Card title-->
													<div class="card-title">
														<h2>Status</h2>
													</div>
													<!--end::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
														<div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
													</div>
													<!--begin::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<!--begin::Select2-->
													<select class="form-select mb-2 fieldtext"
                                                            data-field="status" 
                                                            data-table = "the_agendas"
                                                            data-keyid_fld = "agendaid"
                                                            data-dbid="<?php echo $agenda[0]->agendaid; ?> "/>
														<?php 
															$pubs = null;
															$draf = null;
															if ($agenda[0]->status == 1) {
																$pubs = "selected='selected'";
															} else {
																$draf = "selected='selected'";
															}
														?>
														<option value="1" <?php echo $pubs; ?> >Published</option>
														<option value="0" <?php echo $draf; ?> >Draft</option>
													</select>
													<!--end::Select2-->
													<!--begin::Description-->
													<div class="text-muted fs-7">Set the product status.</div>
													<!--end::Description-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Status-->

										</div>
										<!--end::Aside column-->
										<!--begin::Main column-->
										<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
											<!--begin:::Tabs-->
											<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
												<!--begin:::Tab item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">General</a>
												</li>
												<!--end:::Tab item-->
												<!--begin:::Tab item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Outcomes</a>
												</li>
												<!--end:::Tab item-->
												<!--begin:::Tab item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_reviews">Reviews</a>
												</li>
												<!--end:::Tab item-->
											</ul>
											<!--end:::Tabs-->
											<!--begin::Tab content-->
											<div class="tab-content">
												<!--begin::Tab pane-->
												<div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
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
																<!--begin::Input group-->
																<div class="mb-10 fv-row">
																	<!--begin::Label-->
																	<label class="required form-label">Agenda Title</label>
																	<!--end::Label-->
																	<!--begin::Input-->
																	<input type="text" 
                                                                            class="form-control mb-2 fieldtext" 
                                                                            placeholder="-- here --" 
                                                                            data-field="agendatitle" 
                                                                            data-table = "the_agendas"
                                                                            data-keyid_fld = "agendaid"
                                                                            value="<?php echo $agenda[0]->agendatitle; ?>"
                                                                            data-dbid="<?php echo $agenda[0]->agendaid; ?> "/> 

																	<!--end::Input-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">Give your agenda a unique title</div>
																	<!--end::Description-->
																</div>
                                                                <div class="mb-10 fv-row">
																	<!--begin::Label-->
																	<label class="required form-label">Agenda Name</label>
																	<!--end::Label-->
																	<!--begin::Input-->
                                                                    <input type="text" 
                                                                            class="form-control mb-2 fieldtext" 
                                                                            placeholder="-- here --" 
                                                                            data-field="agendaname" 
                                                                            data-table = "the_agendas"
                                                                            data-keyid_fld = "agendaid"
                                                                            value="<?php echo $agenda[0]->agendaname; ?>"
                                                                            data-dbid="<?php echo $agenda[0]->agendaid; ?> "/> 
																	<!--end::Input-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">Your agenda's unique name</div>
																	<!--end::Description-->
																</div>
                                                                <div class="mb-10 fv-row">
																	<!--begin::Label-->
																	<label class="required form-label">Goal</label>
																	<!--end::Label-->
																	<!--begin::Input-->
                                                                    <textarea type="text" 
                                                                            class="form-control mb-2 fieldtext textareatxt" 
                                                                            placeholder="-- here --" 
                                                                            data-field="thegoal" 
                                                                            data-table = "the_agendas"
                                                                            data-keyid_fld = "agendaid"
                                                                            data-dbid="<?php echo $agenda[0]->agendaid; ?> "><?php echo $agenda[0]->thegoal; ?></textarea>
																	<!--end::Input-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">What is the goal of the agenda</div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
																<!--begin::Input group-->
																<div>
																	<!--begin::Label-->
																	<label class="form-label">Quote</label>
																	<!--end::Label-->
																	<!--begin::Editor-->
																	<textarea id="kt_ecommerce_add_product_description__"
                                                                         class="form-control mb-2 fieldtext textareatxt"
                                                                         data-field="thequote" 
                                                                         data-table = "the_agendas"
                                                                         data-keyid_fld = "agendaid"
                                                                         data-dbid="<?php echo $agenda[0]->agendaid; ?> "><?php echo $agenda[0]->thequote; ?></textarea>
																	<!--end::Editor-->
																	<!--begin::Description-->
																	<div class="text-muted fs-7">Give a powerful quote.</div>
																	<!--end::Description-->
																</div>
																<!--end::Input group-->
															</div>
															<!--end::Card header-->
														</div>
														<!--end::General options-->
														<div class="d-flex justify-content-end">
                                                            <!--begin::Button-->
                                                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                                                <span class="indicator-label">Save Changes</span>
                                                                <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                            <!--end::Button-->
                                                        </div>
													</div>
												</div>
												<!--end::Tab pane-->
												<!--begin::Tab pane-->
												<div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
													<div class="d-flex flex-column gap-7 gap-lg-10">
														<!--begin::Outcomes-->
														<div class="card card-flush py-4">
															<!--begin::Card header-->
															<div class="card-header">
																<div class="card-title">
																	<h2>Outcomes</h2>
																</div>
                                                                <!--begin::Actions-->
                                                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                                                    <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" 
                                                                        data-bs-toggle="modal" data-bs-target="#uploadoutcomes">Add Outcome</a>
                                                                </div>
                                                                <!--end::Actions-->
															</div>
															<!--end::Card header-->
															<!--begin::Card body-->
															<div class="card-body pt-0">
                                                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                                                                    <thead>
                                                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                                            <th class="w-10px pe-2">
                                                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                                                                                </div>
                                                                            </th>
                                                                            <th class="min-w-200px">Name</th>
                                                                            <th class="text-end min-w-100px">No. of KPIs</th>
                                                                            <th class="text-end min-w-100px">Total Weight</th>
                                                                            <th class="text-end min-w-70px">Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="fw-semibold text-gray-600">
                                                                        <?php if (count($outcomes) > 0) { ?>
                                                                            <?php for($i=0;$i<=count($outcomes)-1;$i++) { ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                                                            <input class="form-check-input" type="checkbox" value="1" />
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div class="ms-0">
                                                                                                <!--begin::Title-->
                                                                                                <a href="" 
                                                                                                    class="text-gray-800 text-hover-primary fs-5 fw-bold changeoutcomenameclick" 
																									data-bs-toggle="modal" data-bs-target="#changeoutcomename"
																									data-outcomeid="<?php echo $outcomes[$i]->outcomeid; ?>"
                                                                                                    data-kt-ecommerce-product-filter="product_name"><?php echo $outcomes[$i]->theoutcome; ?></a>
                                                                                                <!--end::Title-->
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="text-end pe-0">
                                                                                        <span class="fw-bold"><?php echo $outcomes[$i]->nokpi; ?></span>
                                                                                    </td>
                                                                                    <td class="text-end pe-0">
                                                                                        <span class="fw-bold"> <?php echo $outcomes[$i]->thevalue; ?> </span>
                                                                                    </td>
                                                                                    <td class="text-end">
                                                                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                                                                        <!--begin::Menu-->
                                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                                            <!--begin::Menu item-->
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#outcomedetails" 
                                                                                                    class="menu-link px-3 editkpi" data-outcomeid="<?php echo $outcomes[$i]->outcomeid; ?>">Indicators</a>
                                                                                            </div>
                                                                                            <!--end::Menu item-->
																							 <!--begin::Menu item-->
                                                                                            <div class="menu-item px-3" style="text-align:left;">
                                                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#addnewindicators" 
                                                                                                    class="menu-link px-3 addnewoutcome_btn" data-outcomeid="<?php echo $outcomes[$i]->outcomeid; ?>">Add new Indicators </a>
                                                                                            </div>
                                                                                            <!--end::Menu item-->
                                                                                            <!--begin::Menu item-->
                                                                                            <div class="menu-item px-3">
                                                                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                                                                            </div>
                                                                                            <!--end::Menu item-->
                                                                                        </div>
                                                                                        <!--end::Menu-->
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
															<!--end::Card header-->
														</div>
														<!--end::Outcomes-->
												
													</div>
												</div>
												<!--end::Tab pane-->
												<!--begin::Tab pane-->
												<div class="tab-pane fade" id="kt_ecommerce_add_product_reviews" role="tab-panel">
													<div class="d-flex flex-column gap-7 gap-lg-10">
														<!--begin::Reviews -->
														<div class="card card-flush py-4">

                                                        </div>
														<!--end::Reviews-->
													</div>
												</div>
												<!--end::Tab pane-->
											</div>
											<!--end::Tab content-->
											
										</div>
										<!--end::Main column-->
									</div>
									<!--end::Form-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
							@include('backend.footcrumbs')
						<!--end::Footer container-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->

		<!--begin::Modals-->
		<!--begin::Modal - Upgrade plan-->
		<div class="modal fade" id="outcomedetails" tabindex="-1" aria-hidden="true">
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
					<div class="modal-body pt-0 pb-15" style="padding-left:0px; padding-right:0px;">
						<div class="card card-flush py-4">
												<!--begin::Card body-->
												<div class="card-body pt-0">
													<div class="d-flex flex-column gap-3">
														<!--begin::Table-->
														<div id="kt_ecommerce_edit_order_product_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                            <div class="table-responsive">
                                                                <div class="dataTables_scroll">
                                                                    <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                                    <div class="dataTables_scrollHeadInner" style="box-sizing: content-box;  width: 100%; padding-right: 0px;">
                                                                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" style="margin-left: 0px; width: 803.4px;">
                                                                            <thead>
                                                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                                                    <th style="vertical-align: middle;" class="min-w-200px sorting" tabindex="0" aria-controls="kt_ecommerce_edit_order_product_table" rowspan="1" colspan="1" style="width: 472.567px;" aria-label="Product: activate to sort column ascending">Indicator</th>
																			    </tr>
                                                                            </thead>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
																	<span id="theindicators"> </span>
																</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"> </div>
                                                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"> </div>
                                                    </div>
                                                </div>
												    <!--end::Table-->
											</div>
										</div>
										    <!--end::Card header-->
									</div>
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - Upgrade plan-->
		<!--end::Modals-->

    	<!--begin::Modals-->
		<!--begin::Modal - Upgrade plan-->
		<div class="modal fade" id="uploadoutcomes" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-650px">
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
                        <div class="text-center mb-13">
							<!--begin::Title-->
							<h1 class="mb-3">Upload Outcomes</h1>
							<!--end::Title-->
							<!--begin::Description-->
							<div class="text-muted fw-semibold fs-5">If you need to download the file format. Please click this
							<a href="#" class="link-primary fw-bold">link</a>.</div>
							<!--end::Description-->
						</div>
                         <div class="card card-flush py-4">
							<!--begin::Card header-->
								<div class="card-header">
									<div class="card-title">
										<h2>Add Outcome</h2>
									</div>
								</div>
							<!--end::Card header-->
							<!--begin::Card body-->
                                <div class="card-body pt-0">
									<div class="fv-row mb-2">
										<label> Outcome Name </label>
                                    	<input type="text" class="form-control" id="theoutcomename"/>
									</div>
									<div class="fv-row mb-2">
										<label> Year Start </label>
                                    	<input type="text" placeholder="YYYY" class="form-control" id="yearstart"/>
									</div>
									<div class="fv-row">
										<label> Year End </label>
                                    	<input type="text" class="form-control" placeholder="YYYY" id="yearend"/>
									</div>
									<button class='btn btn-primary mt-3' id='savenewoutcome' data-agendaid='<?php echo $agendaid; ?>'> Save New Outcome </button>
                                </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal - Upgrade plan-->
		<!--end::Modals-->
        
		<!--begin::Modal -->
		<!-- Upgrade plan-->
		<div class="modal fade" id="changeoutcomename" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-650px">
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
                        <div class="text-center mb-13">
							<!--begin::Title-->
							<h1 class="mb-3">Outcome Name</h1>
							<!--end::Title-->
							<!--begin::Description-->
							<div class="text-muted fw-semibold fs-5">Input the outcome name </div>
							<!--end::Description-->
						</div>
                         <div class="card card-flush py-4">
							<!--begin::Card header-->
								<div class="card-header">
									<div class="card-title">
										<h2>Edit</h2>
									</div>
								</div>
							<!--end::Card header-->
							<!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <span id="outcometxtfield"> </span>
									<button class="mt-2 btn btn-primary fakesave"> Save </button>
                                </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal - Upgrade plan-->
		<!--end::Modals-->

		<!--begin::Modal -->
		<!-- Upgrade plan-->
		<div class="modal fade" id="addnewindicators" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog mw-650px">
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
                        <div class="text-center mb-13">
							<!--begin::Title-->
							<h1 class="mb-3">Add new indicator</h1>
							<!--end::Title-->
						</div>
                         <div class="card card-flush py-4">
							<!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-5">
										<label> Indicator Name</label>
                                    	<input type="text" class="form-control" id="indicatorname"/>
									</div>
									<div class="fv-row mb-5">
										<label> Indicator Definition </label>
										<textarea class="form-control" id="indicatordefinition"></textarea>
									</div>
									<div class="fv-row mb-5">
										<label> Data Source </label>
										<input type="text" class="form-control" id="datasource"/>
									</div>
									<div class="fv-row mb-5">
										<label> Weight </label>
										<input type="text" class="form-control" id="weightoutput"/>
									</div>
									<div class="fv-row mb-5">
										<label> Frequency </label>
										<select class="form-control" id="frequencyoutcome">
											<option value='yearly'> Yearly </option>
											<option value='quarterly'> Quarterly </option>
											<option value='monthly'> Monthly </option>
										</select>
									</div>
									<div class="fv-row mb-5">
										<label> Type </label>
										<select class="form-control" id="typeofoutcome">
											<option value='percentage'> Percentage </option>
                            				<option value='integer'> Integer </option>
										</select>
									</div>
									<div class="fv-row">
										<button class="mt-2 btn btn-primary saveindicator"> Save </button>
									</div>
                                </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal - Upgrade plan-->
		<!--end::Modals-->
		
	</body>
@include('backend.footer')