<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="{{ Route::is('admin.report.kendro') ? 'active' : '' }}">
                    <a href="{{ route('admin.report.kendro') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Kendro Report</span>
                    </a>
                </li> --}}
                {{-- <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Page layouts</span>
                        <span class="pcoded-badge label label-warning">NEW</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" pcoded-hasmenu">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Vertical</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="default/menu-static.html" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Static Layout</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="default/menu-header-fixed.html" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Header Fixed</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="default/menu-compact.html" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Compact</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="default/menu-sidebar.html" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Sidebar Fixed</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class=" pcoded-hasmenu">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Horizontal</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="default/menu-horizontal-static.html" target="_blank"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Static Layout</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="default/menu-horizontal-fixed.html" target="_blank"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Fixed layout</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="default/menu-horizontal-icon.html" target="_blank"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Static With Icon</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="default/menu-horizontal-icon-fixed.html" target="_blank"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Fixed With Icon</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="default/menu-bottom.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Bottom Menu</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="default/navbar-light.html" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-menu"></i>
                        </span>
                        <span class="pcoded-mtext">Navigation</span>
                    </a>
                </li> --}}
                <li class="pcoded-hasmenu {{ Route::is('admin.admin.*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Admin</span>
                        {{-- <span class="pcoded-badge label label-danger">100+</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Route::is('admin.admin.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.admin.index') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Admin List</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.admin.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.admin.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Admin</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="pcoded-hasmenu {{ Route::is('admin.user.*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Users</span>
                        {{-- <span class="pcoded-badge label label-danger">100+</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Route::is('admin.user.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.user.index') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">User List</span>
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.user.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.user.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add User</span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>


            <div class="pcoded-navigation-label">Operations</div>
            <ul class="pcoded-item pcoded-left-item">


                <li class="{{ Route::is('admin.land-lease.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.land-lease.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Lease Order</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.land-lease-application.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.land-lease-application.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Lease Applications</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.lease-session.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.lease-session.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Lease Sessions</span>
                    </a>
                </li>
                <li class="pcoded-hasmenu {{ Route::is('admin.payments.*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Payments</span>
                        {{-- <span class="pcoded-badge label label-danger">100+</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Route::is('admin.payments.lease-application') ? 'active' : '' }}">
                            <a href="{{ route('admin.payments.lease-application') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Application Payments </span>
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.payments.lease-payments') ? 'active' : '' }}">
                            <a href="{{ route('admin.payments.lease-payments') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Lease Payments</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="pcoded-hasmenu {{ Route::is('admin.reports.*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Reports</span>
                        {{-- <span class="pcoded-badge label label-danger">100+</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Route::is('admin.reports.lease-payment') ? 'active' : '' }}">
                            <a href="{{ route('admin.reports.lease-payment') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Payments Reports</span>
                            </a>
                        </li>
                        {{-- <li class="{{ Route::is('admin.payments.lease-payments') ? 'active' : '' }}">
                            <a href="{{ route('admin.payments.lease-payments') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Lease Payments</span>
                            </a>
                        </li> --}}

                    </ul>
                </li>

            </ul>

            <div class="pcoded-navigation-label">Configuration</div>
            <ul class="pcoded-item pcoded-left-item">


                <li class="{{ Route::is('admin.upazila.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.upazila.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Upazila</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.union-pourashava.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.union-pourashava.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Union/Pourashava</span>
                    </a>
                </li>
                {{-- <li class="{{ Route::is('admin.khatian-type.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.khatian-type.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">khatian Type</span>
                    </a>
                </li> --}}
                <li class="{{ Route::is('admin.mouza.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.mouza.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Mouza</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.khatian-list.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.khatian-list.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Khatian No List</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.dag-list.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dag-list.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Dag No List</span>
                    </a>
                </li>

            </ul>

            <div class="pcoded-navigation-label">Application Setting</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Route::is('admin.global-config.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.global-config.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Global Config</span>
                    </a>
                </li>
            </ul>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Route::is('admin.setting.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.setting.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Setting</span>
                    </a>
                </li>
            </ul>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu {{ Route::is('admin.home-setting.*') ? 'active pcoded-trigger' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-layers"></i>
                        </span>
                        <span class="pcoded-mtext">Home Setting</span>
                        {{-- <span class="pcoded-badge label label-danger">100+</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Route::is('admin.home-setting.person.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.home-setting.person.index') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Person List </span>
                            </a>
                        </li>
                        {{-- <li class="{{ Route::is('admin.admin.create') ? 'active' : '' }}">
                            <a href="{{ route('admin.admin.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Admin</span>
                            </a>
                        </li> --}}

                    </ul>
                </li>

            </ul>

            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Route::is('admin.ejara-rate.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.ejara-rate.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span>
                        <span class="pcoded-mtext">Ejara Rate</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
