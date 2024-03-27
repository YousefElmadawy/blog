<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"> Blog Home Page </span>
    </a>

    <!-- Sidebar -->

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>


            <div class="info">
                @auth
                    <a href="{{ route('profile.edit') }}" class="d-block">{{ Auth::user()->name }} </a>
                @endauth


            </div>

        </div>


        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                      <p> Categories </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                      <p> Posts </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link">
                      <p> Tags </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comments.index') }}" class="nav-link">
                      <p> Comments </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permissions.index') }}" class="nav-link">
                      <p> Permissions </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                      <p> Roles </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                      <p> Users </p>
                    </a>
                </li>
            </ul>
        </nav>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
