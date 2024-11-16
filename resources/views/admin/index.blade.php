@extends('layouts.app')

@section('content')
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('admin.index') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">...</span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Sneat</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                    <span class="name-text ms-5">{{ Auth::user()->role_id }}</span>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item active">
                        <a href="{{ route('admin.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('admin.location') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-map"></i>
                            <div data-i18n="Locations">Locations</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Users">Manage Users</div>
                        </a>
                    </li>
                    <li class="menu-item mt-4">
                        <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="menu-icon tf-icons bx bx-log-out"></i>
                            <div data-i18n="Logout">Logout</div>
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

                <div class="content-wrapper">
                    <div class="container mt-5">
                        <div class="row">
                            <!-- total users at the top -->
                            <div class="col-md-2 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Total Users</h5>
                                        <p>{{ $userCount }} users</p>
                                    </div>
                                </div>
                            </div>

                            <!-- pie chart at the bottom -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Locations by Municipality</h5>
                                        <!-- Donut Chart -->
                                        <div id="pieChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>

    <!-- ApexCharts JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
    // Pie Chart Options
    var optionsPieChart = {
        chart: {
            type: 'donut',
            height: 350,
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        series: @json($totalCotsArray), // Pass the total number of cots to the chart
        labels: @json($municipalities), // Pass the municipalities to the chart
        colors: ['#f44336', '#4caf50', '#2196f3', '#ff9800', '#9c27b0', '#3f51b5'], // Custom colors for the chart
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '16px',
                fontWeight: 'bold',
                colors: ['#fff']
            },
            formatter: function (val, opts) {
                var index = opts.seriesIndex;
                var percentage = @json($percentages)[index]; // Get the percentage for the current municipality
                var totalCots = @json($totalCotsArray)[index]; // Get the total number of cots for the current municipality
                return totalCots + ' cots (' + percentage.toFixed(2) + '%)';
            }
        },
        tooltip: {
            theme: 'dark',
            y: {
                formatter: function (val) {
                    return val + ' cots';
                }
            }
        },
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            fontWeight: 'bold',
            markers: {
                width: 15,
                height: 15,
                radius: 5
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    background: 'transparent',
                    labels: {
                        show: true
                    }
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 300
                },
                dataLabels: {
                    enabled: true
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chartPie = new ApexCharts(document.querySelector("#pieChart"), optionsPieChart);
    chartPie.render();
    </script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>
@endsection
