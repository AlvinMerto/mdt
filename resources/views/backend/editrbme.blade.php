@include('backend.header')
<script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.0/lucide.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }

        .tooltip-box {
            display: none;
        }

        .group:hover .tooltip-box {
            display: block;
            animation: fadeIn 0.2s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translate(-50%, 5px); }
            to { opacity: 1; transform: translate(-50%, 0); }
        }

        .input-focus {
            transition: all 0.2s ease;
        }

        .input-focus:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }
    </style>

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
													<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">Outcome Indicators</a>
												</li>
												<!--end:::Tab item-->
												<!--begin:::Tab item-->
												<li class="nav-item">
													<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_report">Reports</a>
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
                                                                        data-bs-toggle="modal" data-bs-target="#uploadoutcomes">Add Outcome Indicator</a>
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
                                                                                <tr id="outcometr_<?php echo $outcomes[$i]->outcomeid; ?>">
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
                                                                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Indicators
                                                                                        <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                                                                        <!--begin::Menu-->
                                                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                                            <!--begin::Menu item-->
                                                                                            <div class="menu-item px-3 text-left">
                                                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#outcomedetails" 
                                                                                                    class="menu-link px-3 editkpi" data-outcomeid="<?php echo $outcomes[$i]->outcomeid; ?>">List</a>
                                                                                            </div>
                                                                                            <!--end::Menu item-->
																							 <!--begin::Menu item-->
                                                                                            <div class="menu-item px-3 text-left">
                                                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#addnewindicators" 
                                                                                                    class="menu-link px-3 addnewoutcome_btn" data-outcomeid="<?php echo $outcomes[$i]->outcomeid; ?>">Add new </a>
                                                                                            </div>
                                                                                            <!--end::Menu item-->
                                                                                            
                                                                                            <!--begin::Menu item-->
                                                                                            <div class="menu-item px-3 text-left font-bold">
                                                                                                <a data-tbl="the_outcomes" data-remove="#outcometr_<?php echo $outcomes[$i]->outcomeid; ?>" data-keyfld="outcomeid" data-keyid="<?php echo $outcomes[$i]->outcomeid; ?>" class="menu-link px-3 bg-red-300 text-white-300 deletethis" data-kt-ecommerce-product-filter="delete_row">Delete This</a>
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
												<div class="tab-pane fade" id="kt_ecommerce_add_product_report" role="tab-panel">
													<div class="d-flex flex-column gap-7 gap-lg-10">
														<!--begin::Reviews -->
														<div class="card_card-flush_p-6">
															<div class="flex items-center justify-left gap-5 mb-5" style="border-bottom: 2px dotted #ccc;padding-bottom: 14px;">
																<a href="#" id="addnewreportbtn" class="text-gray-400 flex justify-left gap-2">
																	+ Add New Report
																</a>
																<a href="#" id="listofreportsbtn" class="text-black-400 font-bold flex justify-left gap-2"> 
																	<svg xmlns="http://www.w3.org/2000/svg" 
																	       fill="none" 
																	       viewBox="0 0 24 24" 
																	       stroke="currentColor" 
																	       class="w-6 h-6 text-gray-600">

																	    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																	      d="M9 17v-6m4 6v-4m4 4v-2M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z"/>
																	 </svg>
																	List of Reports 
																</a>
															</div>
															<div id="listofreports">
																<!-- Submitted Reports Section -->
															        <div class="space-y-4">
															            <div class="flex items-center justify-between">
															                <h2 class="text-lg font-bold text-gray-800">Submitted Reports</h2>
															                <div class="flex space-x-2">
															                    <div class="relative">
															                        <input type="text" placeholder="Search reports..." class="pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-64 bg-white">
															                        <svg class="w-4 h-4 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
															                    </div>
															                </div>
															            </div>

															            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
															                <table class="w-full text-left border-collapse">
															                    <thead>
															                        <tr class="bg-gray-50 border-b border-gray-200">
															                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Report Name</th>
															                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date Submitted</th>
															                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
															                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Attachments</th>
															                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Action</th>
															                        </tr>
															                    </thead>
															                    <tbody class="divide-y divide-gray-100">
															                        <!-- Row 1 -->
															                        <tr class="hover:bg-gray-50 transition-colors group">
															                            <td class="px-6 py-4">
															                                <div class="font-medium text-gray-900">Quarterly Impact Summary</div>
															                                <div class="text-xs text-gray-500">ID: RPT-2024-001</div>
															                            </td>
															                            <td class="px-6 py-4 text-sm text-gray-600">Oct 12, 2024</td>
															                            <td class="px-6 py-4">
															                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">Approved</span>
															                            </td>
															                            <td class="px-6 py-4">
															                                <div class="flex -space-x-2">
															                                    <div class="w-7 h-7 rounded border-2 border-white bg-red-100 flex items-center justify-center text-[10px] font-bold text-red-600">PDF</div>
															                                    <div class="w-7 h-7 rounded border-2 border-white bg-blue-100 flex items-center justify-center text-[10px] font-bold text-blue-600">IMG</div>
															                                </div>
															                            </td>
															                            <td class="px-6 py-4 text-right">
															                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">View Detail</button>
															                            </td>
															                        </tr>
															                        <!-- Row 2 -->
															                        <tr class="hover:bg-gray-50 transition-colors">
															                            <td class="px-6 py-4">
															                                <div class="font-medium text-gray-900">Monthly Performance Log</div>
															                                <div class="text-xs text-gray-500">ID: RPT-2024-015</div>
															                            </td>
															                            <td class="px-6 py-4 text-sm text-gray-600">Nov 02, 2024</td>
															                            <td class="px-6 py-4">
															                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">Pending</span>
															                            </td>
															                            <td class="px-6 py-4">
															                                <div class="w-7 h-7 rounded bg-gray-100 flex items-center justify-center text-[10px] font-bold text-gray-400">—</div>
															                            </td>
															                            <td class="px-6 py-4 text-right">
															                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">View Detail</button>
															                            </td>
															                        </tr>
															                        <!-- Row 3 -->
															                        <tr class="hover:bg-gray-50 transition-colors">
															                            <td class="px-6 py-4">
															                                <div class="font-medium text-gray-900">Project Beta Site Report</div>
															                                <div class="text-xs text-gray-500">ID: RPT-2024-022</div>
															                            </td>
															                            <td class="px-6 py-4 text-sm text-gray-600">Nov 08, 2024</td>
															                            <td class="px-6 py-4">
															                                <span class="px-2.5 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-600">Draft</span>
															                            </td>
															                            <td class="px-6 py-4 text-sm text-gray-400">
															                                3 files
															                            </td>
															                            <td class="px-6 py-4 text-right">
															                                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit Draft</button>
															                            </td>
															                        </tr>
															                    </tbody>
															                </table>
															                <div class="px-6 py-4 bg-white border-t border-gray-100 flex items-center justify-between">
															                    <span class="text-xs text-gray-500">Showing 3 of 12 reports</span>
															                    <div class="flex space-x-2">
															                        <button class="px-3 py-1 text-xs border border-gray-200 rounded hover:bg-gray-50 transition-colors">Previous</button>
															                        <button class="px-3 py-1 text-xs border border-gray-200 rounded hover:bg-gray-50 transition-colors">Next</button>
															                    </div>
															                </div>
															            </div>
															        </div>
															</div>

															<div id="addnewreport" style="display:none;">
																<div class="mb-10 fv-row">
																		<label class="required form-label">Report Title</label>
																		<input type="text" class="form-control mb-2 fieldtext" placeholder="Title" data-field="" data-table="" data-keyid_fld="" data-dbid=""> 
																		<div class="text-muted fs-7">Give your report a unique title</div>
																</div>
																<div>
																	<div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2"></div>
																</div>
																<div class="card card-flush p-6">
												                    <label class="block text-sm font-medium text-gray-700 mb-2">Supporting Documents</label>
												                    <div class="flex items-center justify-left w-full">
												                        <input type="file" class="my-5"/>
												                    </div>
												                </div>
											            	</div>
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
			<div class="modal-dialog mw-1000px">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0">
						<div class="w-100 flex justify-between items-center">
				            <div>
				                <h2 class="text-sm font-bold text-gray-400 uppercase tracking-wider">Indicator Configuration</h2>
				                <p class="text-lg font-semibold text-gray-800">Manage Metrics &amp; Targets</p>
				            </div>
				            <!--begin::Close-->
								<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
									<i class="ki-outline ki-cross fs-1"></i>
								</div>
							<!--end::Close-->
				        </div>
						
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15" style="">
						<div class="">
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
																	<span id="theindicators">  </span>
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
							<!-- <h1 class="mb-3">Upload Outcomes</h1> -->
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
										<h2>Add Outcome Indicator</h2>
									</div>
								</div>
							<!--end::Card header-->
							<!--begin::Card body-->
                                <div class="card-body pt-0">
									<div class="fv-row mb-2">
										<label> Outcome Name </label>
                                    	<input type="text" class="form-control" id="theoutcomename"/>
									</div>
									<div class="flex justify-between gap-2 mb-2">
										<div>
											<label> Year Start </label>
	                                    	<input type="text" placeholder="YYYY" class="form-control" id="yearstart"/>
										</div>
										<div>
											<label> Year End </label>
	                                    	<input type="text" class="form-control" placeholder="YYYY" id="yearend"/>
                                    	</div>
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
							<h1 class="mb-3">&nbsp;</h1>
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
			<div class="">
	        	<div class="modal-dialog mw-550px">
					<!--begin::Modal content-->
					<div class="modal-content rounded">

			        <!-- Header -->
			        <div class="relative px-8 py-6 border-b border-slate-100">
			            <button class="absolute right-6 top-6 text-slate-400 hover:text-slate-600 transition-colors p-1 rounded-full hover:bg-slate-50">
			                <i data-lucide="x" class="w-5 h-5"></i>
			            </button>
			            <div class="flex flex-col gap-1">
			                <h1 class="text-xl font-bold text-slate-900 tracking-tight">Add New Indicator</h1>
			                <p class="text-sm text-slate-500">Define parameters for your tracking metric</p>
			            </div>
			        </div>

			        <!-- Form Body -->
			    	<div class="p-8">
			            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6">
			                
			                <!-- Indicator Name (Full Width) -->
			                <div class="md:col-span-2 mb-5">
			                    <div class="flex items-center gap-1.5 mb-1.5 px-0.5">
			                        <label class="text-sm font-semibold text-slate-700">Indicator Name</label>
			                        <div class="group relative inline-block">
			                            <i data-lucide="help-circle" class="w-3.5 h-3.5 text-slate-400 cursor-help transition-colors group-hover:text-indigo-500"></i>
			                            <div class="tooltip-box absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-48 p-2 bg-slate-800 text-white text-[11px] rounded shadow-xl z-10 pointer-events-none text-center">
			                                Enter a unique and descriptive name for the metric.
			                                <div class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-slate-800"></div>
			                            </div>
			                        </div>
			                    </div>
			                    <input type="text" placeholder="e.g. Annual Revenue Growth" required
			                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 input-focus" id="indicatorname">
			                </div>

			                <!-- Indicator Definition (Full Width) -->
			                <div class="md:col-span-2 mb-5">
			                    <div class="flex items-center gap-1.5 mb-1.5 px-0.5">
			                        <label class="text-sm font-semibold text-slate-700">Indicator Definition</label>
			                    </div>
			                    <textarea rows="3" id="indicatordefinition" placeholder="Describe the purpose and calculation logic..."
			                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 input-focus resize-none"></textarea>
			                </div>

			                <!-- Data Source -->
			                <div class="mb-5">
			                    <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-0.5">Data Source</label>
			                    <input type="text" id="datasource" placeholder="Internal DB, External API..."
			                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus">
			                </div>

			                <!-- Weight -->
			                <div class="mb-5">
			                    <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-0.5">Weight (0-100%)</label>
			                    <div class="relative">
			                        <input type="number" id="weightoutput" placeholder="25" min="0" max="100"
			                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus">
			                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 font-medium">%</span>
			                    </div>
			                </div>

			                <!-- Frequency -->
			                <div class="mb-5">
			                    <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-0.5">Reporting Frequency</label>
			                    <div class="relative group">
			                        <select id="frequencyoutcome" class="w-full appearance-none px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus cursor-pointer">
			                            <option>Monthly</option>
			                            <option>Quarterly</option>
			                            <option selected>Yearly</option>
			                        </select>
			                        <i data-lucide="chevron-down" class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none group-hover:text-slate-600 transition-colors"></i>
			                    </div>
			                </div>

			                <!-- Data Type -->
			                <div class="mb-5">
			                    <label class="block text-sm font-semibold text-slate-700 mb-1.5 px-0.5">Data Type</label>
			                    <div class="relative group">
			                        <select id="typeofoutcome" class="w-full appearance-none px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 input-focus cursor-pointer">
			                            <option selected>Integer</option>
			                            <option>Decimal</option>
			                            <option>Percentage</option>
			                            <option>Currency</option>
			                        </select>
			                        <i data-lucide="chevron-down" class="absolute right-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 pointer-events-none group-hover:text-slate-600 transition-colors"></i>
			                    </div>
			                </div>
			            </div>

			            <!-- Footer Actions -->
			            <div class="mt-8 flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
			                <button  data-bs-dismiss="modal" type="button" class="px-6 py-2.5 text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-xl transition-all">
			                    Cancel
			                </button>
			                <button type="submit" id="" class="flex items-center gap-2 px-8 py-2.5 rounded-xl font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all active:scale-95 saveindicator">
			                    Save Indicator
			                </button>
			            </div>
			        </div>

			        <!-- Tip Box -->
			        <div class="px-8 pb-8">
			            <div class="flex gap-3 p-4 bg-indigo-50 rounded-2xl border border-indigo-100">
			                <i data-lucide="info" class="w-5 h-5 text-indigo-600 shrink-0 mt-0.5"></i>
			                <p class="text-xs text-indigo-700 leading-relaxed">
			                    <strong>Quick Tip:</strong> Ensure that the weight of all indicators for this project totals exactly 100% to ensure accurate dashboard reporting.
			                </p>
			            </div>
			        </div>
			    </div>
				</div>
			</div>

			<!--begin::Modal dialog-->
			
        </div>
        <!--end::Modal - Upgrade plan-->
		<!--end::Modals-->
		
	</body>
@include('backend.footer')