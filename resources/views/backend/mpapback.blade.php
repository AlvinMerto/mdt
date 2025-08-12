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
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                            @include('backend.topbar')
                                <?php if ($panel == "all") { ?>
                                    <div class='mt-5'>
                                        <!--begin::Col-->
                                        <div class="col-lg-12 card card-flush">
                                            <!--begin::Card header-->
                                            <div class="card-header pt-7">
                                                <!--begin::Title-->
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label fw-bold text-dark">Mindanao Programs and Projects</span>
                                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Total <?php echo count($projects); ?> Items in Mindanao</span>
                                                </h3>
                                                <!--end::Title-->
                                                <!--begin::Actions-->
                                                <div class="card-toolbar" style="display:block;">
                                                    <!--begin::Filters-->
                                                    <div class="d-flex flex-stack flex-wrap gap-4">
                                                        <!--begin::Destination-->
                                                        <!-- <div class="d-flex align-items-center fw-bold">
                                                            <div class="text-muted fs-7 me-2">Project Level</div>
                                                            <select class="form-select form-select-transparent">
                                                                <option value="Show All" selected="selected"> Show All </option>
                                                                <option value="1"> Level 1</option>
                                                                <option value="2"> Level 2</option>
                                                                <option value="3"> Level 3</option>
                                                            </select>
                                                        </div> -->
                                                        <!--end::Destination-->

                                                        <!--begin::Search-->
                                                        <a href="{{route('mpapadd')}}" class="btn btn-primary btn-sm">Add Project</a>
                                                        <!--end::Search-->
                                                    </div>
                                                    <!--begin::Filters-->
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body">
                                                <!--begin::Table-->
                                                <div id="kt_table_widget_5_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div class="table-responsive">
                                                        <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer">
                                                            <!--begin::Table head-->
                                                            <thead>
                                                                <!--begin::Table row-->
                                                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                                    <th> &nbsp; </th>
                                                                    <th class='text-center'> PROJECTS </th>
                                                                    <th> DEVELOPMENT PARTNER</th>
                                                                    <!-- <th> Status </th> -->
                                                                    <!-- <th> Project Level </th> -->
                                                                </tr>
                                                                <!--end::Table row-->
                                                            </thead>
                                                            <!--end::Table head-->
                                                            <!--begin::Table body-->
                                                            <tbody class="fw-bold text-gray-600">
                                                                <?php 
                                                                    if (count($devparts) > 0) {
                                                                        $count = 1;
                                                                        foreach($devparts as $dp) {
                                                                            $theclass = (($count%2)==0)?"even":"odd";
                                                                            echo "<tr class='{$theclass} devpartnertr bring_down' data-arrowdata='{$dp->id}'>";
                                                                                echo "<td class='text-center'> <i class='bi bi-arrow-down-circle font-20 color-gray'></i> </td>";
                                                                                echo "<td class='text-center'>";
                                                                                    echo $dp->prjcnt;
                                                                                echo "</td>";
                                                                                echo "<td>";
                                                                                    $thelogo = asset("images/icons/{$dp->logo}");
                                                                                    echo "<img src='{$thelogo}.png' class='thelogoclass'/>";
                                                                                    echo $dp->devpartner;
                                                                                    // echo "<a href='{{url('dashboard/mpap/edit')}}/{$dp->masterid}' class='text-dark text-hover-primary'>{$dp->devpartner}</a>";
                                                                                echo "</td>";
                                                                            echo "</tr>";
                                                                            echo "<tr class='devpart{$dp->id} thedevs'>";

                                                                            echo "</tr>";
                                                                        $count++;
                                                                        }
                                                                    }
                                                                ?>
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                    </div>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($panel == "add") { ?>
                                    <div class='mt-5'>
                                        <!--begin::Col-->
                                        <div class="col-lg-12 card card-flush">
                                            <!--begin::Table-->
                                            <div id="kt_table_widget_5_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="card card-flush py-4">
                                                    <!--begin::Card header-->
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h2>General</h2>
                                                        </div>
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <form method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="card-body pt-0">
                                                            <!--begin::Input group-->
                                                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                                                <!--begin::Label-->
                                                                <label class="required form-label">Project Title</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <input type="text" name="projectitle" class="form-control mb-2" placeholder="Product name">
                                                                <!--end::Input-->
                                                                <!--begin::Description-->
                                                                <div class="text-muted fs-7">Add the project title</div>
                                                                <!--end::Description-->
                                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="mb-5">
                                                                <!--begin::Label-->
                                                                <label class="form-label">Description</label>
                                                                <!--end::Label-->
                                                                <!--begin::Editor-->
                                                                <div>
                                                                    <textarea class="form-control mb-2 textareatxt" name="projectdesc"></textarea>
                                                                </div>
                                                                <!--end::Editor-->
                                                                <!--begin::Description-->
                                                                <div class="text-muted fs-7">Set a description to the project for better visibility.</div>
                                                                <!--end::Description-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <div>
                                                                <button type ="submit" class='btn btn-primary'> Add New </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!--end::Card header-->
                                                </div>
                                            </div>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                <?php } ?>
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