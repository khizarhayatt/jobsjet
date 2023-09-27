<div class="main-sidebar sidebar-style-2" style="overflow: hidden; outline: none;" tabindex="1">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img alt="image" src="assets/img/logo.png" class="header-logo">
                <span class="logo-name">JobsJet</span>
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


            <div class="navwrap">
                <li class="dropdown">
                    <a href="#" class=" nav-link ">
                        <i class="fa-solid fa-file-invoice-dollar"></i><span>Orders </span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class=" nav-link ">
                        <i class="fa-solid fa-building"></i><span>Comapny </span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class=" nav-link ">
                        <i class="fa-solid fa-user-tie"></i><span>Candidate </span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class=" nav-link has-dropdown">
                        <i class="fa-solid fa-briefcase"></i><span>Jobs </span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">All Jobs</a></li>
                        <li><a class="nav-link" href="#">Job Categories</a></li>
                        <li><a class="nav-link" href="#">Job Roles</a></li>

                    </ul>

                </li>
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-sliders"></i><span>Attributes </span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class=" hover-icon">
                            <a href="{{ route('industry.index') }}" class="nav-link ">
                                <i class="nav-icon fas fa-industry"></i>
                                Industry Type
                            </a>

                        </li>

                        <li class=" hover-icon">
                            <a href="{{ route('profession.index') }}" class="nav-link ">
                                <i class="nav-icon fas fa-id-card"></i>
                                Professions
                            </a>

                        </li>

                        <li class=" hover-icon">
                            <a href="{{ route('skill.index') }}" class="nav-link ">
                                <i class="nav-icon fas fa-cog"></i>
                                Skills
                            </a>

                        </li>

                        <li class=" hover-icon">
                            <a href="{{ route('tag.index') }}" class="nav-link ">
                                <i class="nav-icon fas fa-tags"></i>
                                Tags
                            </a>

                        </li>

                        <li class=" hover-icon">
                            <a href="{{ route('benefit.index') }}" class="nav-link ">
                                <i class="nav-icon fas fa-bullseye"></i>
                                Benefits
                            </a>

                        </li>

                        <li class=" hover-icon">
                            <a href="{{ route('language.index') }}" class="nav-link ">
                                <i class="nav-icon fas fa-language"></i>
                                Language
                            </a>

                        </li>
                        <li class=" hover-icon">
                            <a href="{{ route('organization.index') }}"" class="nav-link ">
                                <i class="nav-icon fas fa-industry"></i>
                                Organization Type
                            </a>

                        </li>
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
                <li class="dropdown">
                    <a href="#" class="menu-toggle nav-link has-dropdown">
                        <i class="fa-solid fa-user-group"></i><span>Users & Roles </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('users.index') }}">All Users </a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}"> Roles & Permissions</a></li>
                        <li><a class="nav-link" href="#">Activity & History</a></li>
                    </ul>
                </li>
            </div>
            <li class="dropdown">
                <a href="{{ route('admin.logout') }}" class="nav-link  ">
                    <i class="fa-solid fa-right-from-bracket"></i><span>Logout</span>
                </a>
            </li>




        </ul>
    </aside>
</div>
