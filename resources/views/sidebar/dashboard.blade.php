<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('home') }}"><img src="{{ URL::to('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                        @if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
                            
                            <!-- <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span> -->
                            <hr>
                            <span>Role Name:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Super Admin')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-info">Super Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Normal User')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->name }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-warning">User Normal</span>
                            @endif
                        </div>
                    </div>
                </li>

                @if (Auth::user()->role_name=='Admin')
                <!-- <li class="sidebar-item">
                    <a href="{{ route('change/password') }}" class='sidebar-link'>
                        <i class="bi bi-shield-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li> -->
                
                @endif

                @if (Auth::user()->role_name=='Admin' || Auth::user()->role_name=='Hr' || Auth::user()->role_name=='Manager' || Auth::user()->role_name=='Team Leader' || Auth::user()->role_name=='Trainor')
                    <!-- <li class="sidebar-title">Page &amp; Controller</li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Maintenain</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('userManagement') }}">User Control</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('activity/log') }}">User Activity Log</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('activity/login/logout') }}">Activity Log</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="sidebar-title">Page &amp; Controller</li> -->
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Employees</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('employeeManagement') }}">Employees Management</a>
                            </li>
                            <!-- <li class="submenu-item">
                                <a href="{{ route('clientEmployee') }}">Client Employee</a>
                            </li> -->
                            <li class="submenu-item">
                                <a href=""></a>
                            </li>
                        </ul>                                                       
                    </li>
                    <li class="sidebar-item">
                    <a href="{{ route('clientManagement') }}" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Client</span>
                    </a>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-ruled-fill"></i>
                            <span>HR</span>
                        </a>
                        <ul class="submenu">
                            <!-- <li class="submenu-item">
                                <a href="">Documents</a>
                            </li> -->
                            <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-folder-fill"></i>
                            <span>Documents</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('generalDocuments') }}">General Documents</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('employeeDocuments') }}">Employees Documents</a>
                            </li>
                            <li class="submenu-item">
                                <a href=""></a>
                            </li>
                        </ul>                                                       
                    </li>
                            <li class="submenu-item">
                                <a href="{{ route('announcement') }}">Announcement</a>
                            </li>
                            <li class="submenu-item">
                                <a href=""></a>
                            </li>
                        </ul>                                                       
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Organisations</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('employmentStatus') }}">Employment Status</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('jobStatus') }}">Job Status</a>
                            </li>
                            <li class="submenu-item">
                                <a href="{{ route('lineManagers') }}">Line Managers</a>
                            </li>
                        </ul>                                                       
                    </li>
                <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-shield-shaded"></i>
                            <span>Activity Log</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <a href="{{ route('activity/login/logout') }}">Activity Login & Logout</a>
                            </li>
                            <!-- <li class="submenu-item">
                                <a href="{{ route('activity/log') }}">User Activity Log</a>
                            </li> -->
                            <!-- <li class="submenu-item">
                                <a href="#">Line Managers</a>
                            </li> -->
                        </ul>                                                       
                    </li>
                @endif
                
                @if (Auth::user()->role_name=='Admin')
                <!-- <li class="sidebar-title">Forms &amp; Tables</li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Form Elements</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item active">
                            <a href="{{ route('form/staff/new') }}">Staff Input</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>View Record</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('form/view/detail') }}">View Detail</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('lock_screen') }}" class='sidebar-link'>
                        <i class="bi bi-lock-fill"></i>
                        <span>Lock Screen</span>
                    </a>
                </li> -->
                @endif
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
