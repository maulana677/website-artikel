<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="#" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="#" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="#" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Web Artikel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CF</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['dashboard']) }}"><a class="nav-link" href="{{ route('dashboard') }}"><i
                        class="fas fa-fire"></i>General
                    Dashboard</a>
            </li>

            <li class="menu-header">Starter</li>

            {{--  <li class="dropdown">
                <a class="nav-link" href="{{ route('admin.projects.index') }}"><i class="fas fa-stream"></i>
                    <span>Projects</span>
                </a>
            </li>  --}}
            <li class="nav-item dropdown {{ setSidebarActive(['admin.small-title.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Hero</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.small-title.*']) }}">
                        <a class="nav-link" href="#">Small Title</a>
                    </li>
                </ul>
            </li>

            <li class="{{ setSidebarActive(['admin.artikel.*']) }}">
                <a class="nav-link" href="{{ route('admin.artikel.index') }}"><i class="fas fa-address-card"></i>
                    <span>Artikel</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
