<aside id="layout-menu" class="layout-menu menu-vertical menu bg-white text-dark border-end">
    <div class="app-brand demo bg-light py-3 px-2 border-bottom">
        <a href="{{ route('admin.index') }}" class="app-brand-link d-flex align-items-center text-dark">
            <span class="app-brand-logo demo">...</span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">My Admin</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none text-dark">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
        <span class="name-text ms-5 badge bg-success text-white px-3 py-2 rounded">{{ Auth::user()->role->role_name }}</span>
    </div>
    <div class="menu-inner-shadow bg-light"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('admin.index') }}" class="menu-link text-dark hover-bg-primary hover-text-white">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.location') }}" class="menu-link text-dark hover-bg-primary hover-text-white">
                <i class="menu-icon tf-icons bx bx-map"></i>
                <div data-i18n="Locations">Locations</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.report') }}" class="menu-link text-dark hover-bg-primary hover-text-white">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Users">Report</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.adduser') }}" class="menu-link text-dark hover-bg-primary hover-text-white">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Users">Manage Users</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.municipal') }}" class="menu-link text-dark hover-bg-primary hover-text-white">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Municipal</div>
            </a>
        </li>
        <li class="menu-item mt-4">
            <a href="{{ route('logout') }}" class="menu-link text-dark hover-bg-danger hover-text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</aside>
