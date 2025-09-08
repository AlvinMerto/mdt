@include('backend.header')
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
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
			<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-animation="false" data-kt-sticky-offset="{default: '0px', lg: '0px'}">
				<!--begin::Header container-->
				@include('front.mainnavs',['navigation'=>'mindaconnect'])
				<!--end::Header container-->
			</div>
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
						<!--begin::Content-->
						<div id="kt_app_content" class="app-content flex-column-fluid">
							<!--begin::Content container-->
							<div id="kt_app_content_container" class="app-container container-fluid">
								@include('backend.topbar')
								<!--begin::Category-->
								<div class="card card-flush">
									<!--begin::Card header-->
									<div class="card-header align-items-center pt-10 gap-2 gap-md-5">
										<!--begin::Toolbar wrapper-->
										<div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
											<!--begin::Page title-->
											<div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
												<!--begin::Title-->
												<h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">Mindanao Agenda</h1>
												<!--end::Title-->
											</div>
											<!--end::Page title-->
										</div>
										<!--end::Toolbar wrapper-->
										<!--begin::Card title-->
										<div class="card-title">
											<!--begin::Search-->
											<div class="d-flex align-items-center position-relative my-1">
												<i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
												<input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Category" />
											</div>
											<!--end::Search-->
										</div>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Add customer-->
											<a href="../../demo55/dist/apps/ecommerce/catalog/add-category.html" class="btn btn-primary">Add Item to Monitor</a>
											<!--end::Add customer-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
											<thead>
												<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
													<th class="w-10px pe-2">
														<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
															<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
														</div>
													</th>
													<th class="min-w-250px">Agenda</th>
													<th class="min-w-150px">Status</th>
													<th class="text-end min-w-70px">Actions</th>
												</tr>
											</thead>
											<tbody class="fw-semibold text-gray-600">
												<?php if (count($agenda) > 0) { ?>
													<?php for ($i = 0; $i <= count($agenda) - 1; $i++) { ?>
														<?php
														$agendaicon = asset("storage/images/ma_icons/{$agenda[$i]->thelogo}"); //"background-image:url({$agenda[$i]->thelogo})";
														?>
														<tr>
															<td>
																<div class="form-check form-check-sm form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox" value="1" />
																</div>
															</td>
															<td>
																<div class="d-flex">
																	<!--begin::Thumbnail-->
																	<a href="{{url('dashboard/rbme')}}/<?php echo $agenda[$i]->agendaid; ?>" class="symbol symbol-50px">
																		<span class="symbol-label" style="background-image:url(<?php echo $agendaicon; ?>);"></span>
																	</a>
																	<!--end::Thumbnail-->
																	<div class="ms-5">
																		<!--begin::Title-->
																		<a href="{{url('dashboard/rbme')}}/<?php echo $agenda[$i]->agendaid; ?>" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-category-filter="category_name">
																			<?php echo $agenda[$i]->agendatitle; ?>
																		</a>
																		<!--end::Title-->
																		<!--begin::Description-->
																		<div class="text-muted fs-7 fw-bold"><?php echo $agenda[$i]->agendaname; ?></div>
																		<!--end::Description-->
																	</div>
																</div>
															</td>
															<td>
																<!--begin::Badges-->
																<div class="badge badge-light-success">Automated</div>
																<!--end::Badges-->
															</td>
															<td class="text-end">
																<a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
																	<i class="ki-outline ki-down fs-5 ms-1"></i></a>
																<!--begin::Menu-->
																<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="{{url('dashboard/rbme')}}/<?php echo $agenda[$i]->agendaid; ?>" class="menu-link px-3">Edit</a>
																	</div>
																	<!--end::Menu item-->
																	<!--begin::Menu item-->
																	<div class="menu-item px-3">
																		<a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">Delete</a>
																	</div>
																	<!--end::Menu item-->
																</div>
																<!--end::Menu-->
															</td>
														</tr>
													<?php } ?>
												<?php } ?>
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Category-->
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