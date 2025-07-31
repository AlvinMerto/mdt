@include('backend.header')
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@include('backend.sidebar_mobile')
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					<div id="kt_app_sidebar" class="app-sidebar flex-column mt-lg-4 ps-2 pe-2 ps-lg-7 pe-lg-4" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
						@include('backend.sidebar_screen')
					</div>
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
											<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Overview</h1>
											<!--end::Title-->
											<!--begin::Breadcrumb-->
											<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
												<!--begin::Item-->
												<li class="breadcrumb-item text-muted">
													<a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Home</a>
												</li>
												<!--end::Item-->
											</ul>
											<!--end::Breadcrumb-->
										</div>
										<!--end::Page title-->
										<!--begin::Actions-->

										<!--end::Actions-->
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
									<!--begin::Row-->
									<div class="row gx-6 gx-xl-9">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Summary-->
											<div class="card card-flush h-lg-100">
												<!--begin::Card header-->
												<div class="card-header mt-6">
													<!--begin::Card title-->
													<div class="card-title flex-column">
														<h3 class="fw-bold mb-1">Indicators</h3>
														<div class="fs-6 fw-semibold text-gray-400">5 Macro Indicators</div>
													</div>
													<!--end::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
														<div class="d-flex align-items-center gap-2 gap-lg-3">
															<a href="#" class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold viewmadet">Add New</a>
														</div>
													</div>
													<!--end::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body d-flex flex-column p-9 pt-3">
													<?php if (count($macro) > 0) { ?>
														<?php foreach($macro as $m) { ?>
															<!--begin::Item-->
															<div class="d-flex align-items-center mb-5">
																<!--begin::Avatar-->
																<div class="me-5 position-relative">
																	<!--begin::Image-->
																	<div class="symbol-label bg-light">
																		<i class="ki-outline ki-abstract-26 fs-2 text-gray-500"></i>
																	</div>
																	<!--end::Image-->
																</div>
																<!--end::Avatar-->
																<!--begin::Details-->
																<div class="fw-semibold">
																	<a class="fs-5 fw-bold text-gray-900 text-hover-primary"><?php echo $m->theindicator; ?></a>
																	<div class="text-gray-400">Last Update: {{ \Carbon\Carbon::parse($m->updated_at)->diffForHumans() }} </div>
																</div>
																<!--end::Details-->
																<!--begin::Badge-->
																<div class="badge badge-light ms-auto">
																	<a data-mid="<?php echo $m->ma_id; ?>" class="btn btn-bg-light btn-active-color-primary btn-sm viewmadet">View</a>
																</div>
																<!--end::Badge-->
															</div>
															<!--end::Item-->
														<?php } ?>
													<?php } ?>
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Summary-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Graph-->
											<div class="card card-flush h-lg-100">
												<!--begin::Card header-->
												<div class="card-header mt-6">
													<!--begin::Card title-->
													<div class="card-title flex-column">
														<h3 class="fw-bold mb-1">Details</h3>
													</div>
													<!--end::Card title-->
													<!--begin::Card toolbar-->
													<div class="card-toolbar">
														<!--begin::Select-->
														<select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-solid form-select-sm fw-bold w-100px">
															<option value="1">2020 Q1</option>
															<option value="2">2020 Q2</option>
															<option value="3" selected="selected">2020 Q3</option>
															<option value="4">2020 Q4</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Card toolbar-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body pt-2 pb-0 px-5">
													<!--begin::Chart-->
													<div id="ma_details"></div>
													<!--end::Chart-->
												</div>
												<!--end::Card body-->
											</div>
											<!--end::Graph-->
										</div>
										<!--end::Col-->
									</div>
									
										<!--end::Col-->
					
									</div>
									<!--end::Row-->
									<!--end::Card-->
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
	</body>

@include('backend.footer')