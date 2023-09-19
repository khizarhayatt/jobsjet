<div class="main-sidebar sidebar-style-2" style="overflow: hidden; outline: none;" tabindex="1">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="assets/img/logo.png" class="header-logo">
                <span class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="index.html" class="nav-link toggled">
                    <i class="fas fa-desktop"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Modules</li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fa-solid fa-user"></i><span>Users </span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Users List</a></li>
                    <li><a class="nav-link" href="#">Create User</a></li>
                    <li><a class="nav-link" href=""> Roles</a></li>
                    <li><a class="nav-link" href="{{ route('permissions.index') }}"> Permissions</a></li>
                    <li><a class="nav-link" href="#">Activity & History</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fa-solid fa-briefcase"></i><span>Jobs </span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Avatar</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-credit-card"></i><span>Payments</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Avatar</a></li>
                </ul>
            </li>

            <li>
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports & Analytics</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="#">
                    <i class="fas fa-envelope"></i>
                    <span>Email Notifications</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
