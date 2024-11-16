@extends('layouts.app')

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('admin.index') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <!-- SVG Logo Here -->
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
                    </a>
                    <span class="name-text ms-5">{{ Auth::user()->name }}</span>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.location') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-map"></i>
                            <div>Locations</div>
                        </a>
                    </li>                    
                    <li class="menu-item active">
                        <a href="{{ route('admin.report') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div>Report</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.adduser') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div>Manage Users</div>
                        </a>
                    </li>

                    <li class="menu-item mt-4">
                        <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="menu-icon tf-icons bx bx-log-out"></i>
                            <div>Logout</div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Card for Location Report -->

                <div class="d-flex justify-content-between my-3">
    <a href="{{ route('admin.report.export') }}" class="btn btn-success">
        <i class="bx bx-download"></i> Export to Excel
    </a>
</div>

                <div class="card shadow-sm mt-4">
                    <h5 class="card-header bg-dark text-white p-3 rounded-top">
                        <i class="bx bx-map"></i> Location Report
                    </h5>
                    <div class="table-responsive text-nowrap p-3">
                        <table class="table table-hover table-striped table-sm table-bordered m-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Municipality</th>
                                    <th>Number of Cots</th>
                                    <th>Size of Cots</th>
                                    <th>Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td> <!-- Display incrementing number -->
                                        <td>{{ $location->name }}</td>
                                        <td>{{ $location->description }}</td>
                                        <td>{{ $location->municipality }}</td>
                                        <td>{{ $location->number_of_cots }}</td>
                                        <td>{{ $location->size_of_cots }}</td>
                                        <td>
                                            @if($location->photo)
                                                <img src="{{ asset('storage/' . $location->photo) }}" alt="Location Photo" class="img-fluid rounded" style="max-width: 70px;">
                                            @else
                                                <span class="text-muted">No photo</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center my-3">
                        {{ $locations->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
            <!-- / Layout container -->
        </div>
    </div>
@endsection
