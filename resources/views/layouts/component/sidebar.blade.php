<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                <a href="#" class="d-block">{{ auth()->user()->email }}</a>
                <a href="#" class="d-block"><span class="badge badge-success">{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</span></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Route::is('example.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('exampleDataTable.*') ? 'active' : '' }} {{ Route::is('example.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa fa-paperclip"></i>
                        <p>
                            Example Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('example.index') }}" class="nav-link {{ Route::is('example.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Example Table</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('exampleDataTable.index') }}" class="nav-link {{ Route::is('exampleDataTable.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Example DataTable</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>