<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <as class="sidebar-brand" href="index.html">
            <span class="align-middle">Super Admin</span>
        </as>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ request()->routeIs('tu.dashboard') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ route('tu.dashboard') }}">
                    <i class="align-middle" data-feather="home"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('tu.profile.edit') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ route('tu.profile.edit') }}">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('tu.pekerjaan_ortu.index') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ route('tu.pekerjaan_ortu.index') }}">
                    <i class="align-middle" data-feather="briefcase"></i>
                    <span class="align-middle">Pekerjaan Orang Tua</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('tu.kelola_tu.index') ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ route('tu.kelola_tu.index') }}">
                    <i class="align-middle" data-feather="database"></i>
                    <span class="align-middle">Data TU</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
