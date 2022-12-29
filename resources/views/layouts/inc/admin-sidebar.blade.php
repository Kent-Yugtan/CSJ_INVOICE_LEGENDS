<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="{{url('admin/dashboard')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    Dashboard
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Profiles
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('admin/profile')}}">Add Profile</a>
                        <a class="nav-link" href="{{url('admin/current')}}">Current Profiles</a>
                        <a class="nav-link" href="{{url('admin/inactive')}}">Inactive Profiles</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2"
                    aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    Invoices
                    <div class="sb-sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('admin/invoice')}}">Add Invoice</a>
                        <a class="nav-link" href="{{url('invoice/current_invoice')}}">Current Invoices</a>
                        <a class="nav-link" href="{{url('invoice/inactive_invoice')}}">Inactive Invoices</a>
                    </nav>
                </div>

                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-plus-minus"></i>
                    </div>
                    Deductions
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Reports
                </a>
                <hr>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></i></div>
                    Settings
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>