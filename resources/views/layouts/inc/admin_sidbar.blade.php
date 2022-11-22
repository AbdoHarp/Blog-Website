<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('/admin/dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/add_category') || Request::is('admin/edit_category/*') ? 'collapsed active' : 'collapsed' }}"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/category') || Request::is('admin/add_category') || Request::is('admin/edit_category/*') ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add_category') ? 'active' : '' }}"
                            href="{{ url('/admin/add_category') }}">Add Category</a>
                        <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/edit_category/*') ? 'active' : '' }}"
                            href="{{ url('/admin/category') }}">View Category</a>
                    </nav>
                </div>
                <a class="nav-link {{ Request::is('admin/post') || Request::is('admin/add_post') || Request::is('admin/posts') || Request::is('admin/edit_post/*') ? 'collapsed active' : 'collapsed' }}"
                    data-bs-toggle="collapse" data-bs-target="#collapsepost" aria-expanded="false"
                    aria-controls="collapsepost">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Request::is('admin/post') || Request::is('admin/add_post') || Request::is('admin/posts') || Request::is('admin/edit_post/*') ? 'show' : '' }}"
                    id="collapsepost" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add_post') ? 'active' : '' }}"
                            href="{{ url('/admin/add_post') }}">Add Post</a>
                        <a class="nav-link {{ Request::is('admin/posts') || Request::is('admin/edit_post/*') ? 'active' : '' }}"
                            href="{{ url('/admin/posts') }}">View Posts</a>
                    </nav>
                </div>
                <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                </a>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ url('admin/settings') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Settings
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: Admin </div>
            Start blog
        </div>
    </nav>
</div>
