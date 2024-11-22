@extends('layouts.app')

@section('content')
<body>
        <div class="content-wrapper">
    <div class="container d-flex justify-content-center align-items-center flex-column mt-5">
        <div class="row w-100 justify-content-center">
            <!-- Total Users Card -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg rounded-lg text-center" style="background-color: #f7f7f7; border: none;">
                    <div class="card-body" style="padding: 30px;">
                        <h5 class="mb-3" style="font-weight: 600; color: #333;">Total Users</h5>
                        <p style="font-size: 1.5rem; font-weight: bold; color: #4caf50;">{{ $userCount }} users</p>
                    </div>
                </div>
            </div>

            <!-- Total Cots Card -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-lg rounded-lg text-center" style="background-color: #f7f7f7; border: none;">
                    <div class="card-body" style="padding: 30px;">
                        <h5 class="mb-3" style="font-weight: 600; color: #333;">Total Cots</h5>
                        <p style="font-size: 1.5rem; font-weight: bold; color: #ff9800;">{{ $totalCots }} cots</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart Card -->
        <div class="row w-100 justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card shadow-lg rounded-lg" style="border: none;">
                    <div class="card-body">
                        <h5 class="text-center" style="font-weight: 600; color: #333;">Locations by Municipality</h5>
                        <!-- Donut Chart -->
                        <div id="pieChart" style="height: 350px;"></div>
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
