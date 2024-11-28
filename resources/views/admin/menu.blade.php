<aside id="layout-menu" class="layout-menu menu-vertical menu bg-white text-dark border-end">
    <div class="app-brand demo bg-light py-3 px-2 border-bottom">
        <a href="{{ route('admin.index') }}" class="app-brand-link d-flex align-items-center text-dark text-decoration-none">
            <img src="{{ asset('images/logo.png') }}" alt="COTS Tracker Logo" class="app-brand-logo demo" height="30">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">COTS Tracker</span>
        </a>
    </div>
    <div class="menu-inner-shadow bg-light"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ route('admin.index') }}" class="menu-link text-dark hover-bg-primary hover-text-white text-decoration-none">
                <i class="menu-icon tf-icons bx bx-home-alt"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.location') }}" class="menu-link text-dark hover-bg-primary hover-text-white text-decoration-none">
                <i class="menu-icon tf-icons bx bx-location-plus"></i>
                <div data-i18n="Locations">Locations</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.report') }}" class="menu-link text-dark hover-bg-primary hover-text-white text-decoration-none">
                <i class="menu-icon tf-icons bx bx-bar-chart-alt"></i>
                <div>Report</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.adduser') }}" class="menu-link text-dark hover-bg-primary hover-text-white text-decoration-none">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Users">Manage Users</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('admin.municipal') }}" class="menu-link text-dark hover-bg-primary hover-text-white text-decoration-none">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Analytics">Municipal</div>
            </a>
        </li>
        <li class="menu-item mt-4">
            <a href="{{ route('logout') }}" class="menu-link text-dark hover-bg-danger hover-text-white text-decoration-none" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</aside>
